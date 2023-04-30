<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

use Jenssegers\Date\Date;

use Alert;

use App\User;
use App\Member;
use App\Outlet;
use App\Paket;
use App\Transaksi;
use App\Detail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(){

        $user = DB::table('users')->count();
        $member = DB::table('member')->count();

        $transaksi = DB::table('transaksi')
        ->join('member','transaksi.id_member','=','member.id_member')
        ->count();
        $baru = DB::table('transaksi')
        ->where('status_transaksi',"Baru")
        ->join('member','transaksi.id_member','=','member.id_member')
        ->count();
        $selesai = DB::table('transaksi')
        ->where('status_transaksi',"Selesai")
        ->join('member','transaksi.id_member','=','member.id_member')
        ->count();
        $proses = DB::table('transaksi')
        ->where('status_transaksi',"Proses")
        ->join('member','transaksi.id_member','=','member.id_member')
        ->count();

        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->count();
        
        return view('pages/admin/dashboard',compact('user','member','transaksi','outlet','baru','selesai','proses'));
    }


    // USER
    public function list_user(){

        $user = DB::table('users')->join('outlet','users.id_outlet','outlet.id_outlet')->orderBy('id','asc')->get();

        return view('pages/admin/manage_user/list_user',compact('user'));
    }
    public function delete_user($id){

        DB::table('users')->where('id',$id)->delete();

        Alert::success('Berhasil','Berhasil Menghapus User');

        return redirect('/admin/list_user');
    }
    public function tambah_user(){
        $no = 0;
        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();

        return view('pages/admin/manage_user/tambah_user',compact('outlet'));
    }
    public function cek_user(Request $request){
        $cek = DB::table('users')->where('username',$request->username)->count();
        if ($cek>0) {
            return "ada" ;
        }
    }
    public function cek_email(Request $request){
        $cek = DB::table('users')->where('email',$request->email)->count();
        if ($cek>0) {
            return "ada_email" ;
        }
    }
    public function upload_user(Request $request){ 
        if ($request->role == "kasir") {
            $upload = User::create([
                'name'=>$request->nama,
                'username'=>$request->username,
                'role'=>$request->role,
                'id_outlet'=>$request->outlet,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
            ]);
        }else{
            $upload = User::create([
                'name'=>$request->nama,
                'username'=>$request->username,
                'role'=>$request->role,
                'id_outlet'=>0,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
            ]);

        }

        Alert::success('Berhasil','Berhasil Menambah User');

        return redirect('/admin/list_user');
    }
    public function update_user(Request $request){ 

        if ($request->role == "kasir") {
            $upload = DB::table('users')->where('id',$request->id)->update([
                'name'=>$request->nama,
                'username'=>$request->username,
                'role'=>$request->role,
                'id_outlet'=>$request->outlet,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
            ]);
        }else{
            $upload = DB::table('users')->where('id',$request->id)->update([
                'name'=>$request->nama,
                'username'=>$request->username,
                'role'=>$request->role,
                'id_outlet'=>0,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
            ]);

        }

        Alert::success('Berhasil','Berhasil Menambah User');

        return redirect('/admin/list_user');
    }
    public function edit_user($id){

        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();
        $user = DB::table('users')->where('id',$id)->first();

        return view('/pages/admin/manage_user/edit_user',compact('user','outlet'));

    }


    // outlet
    public function list_outlet(){
        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();

        return view('/pages/admin/manage_outlet/list_outlet',compact('outlet'));
    }
    public function tambah_outlet(){

        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();

        return view('pages/admin/manage_outlet/tambah_outlet',compact('outlet'));

    }
    public function upload_outlet(Request $request){

        $outlet = Outlet::create([
            'nama_outlet'=>$request->nama,
            'alamat_outlet'=>$request->alamat,
            'tlp_outlet'=>$request->tlp,
        ]);

        Alert::success('Berhasil','Berhasil Menambah Outlet');

        return redirect('/admin/list_outlet');

    }
    public function delete_outlet($id){

        DB::table('outlet')->where('id_outlet',$id)->delete();
        DB::table('paket')->where('id_outlet',$id)->delete();

        Alert::success('Berhasil','Berhasil Menghapus Data Outlet');

        return redirect('/admin/list_outlet');
    }
    public function edit_outlet($id){

        $outlet = DB::table('outlet')->where('id_outlet',$id)->first();

        return view('/pages/admin/manage_outlet/edit_outlet',compact('outlet'));

    }
    public function update_outlet(Request $request){

        $outlet = DB::table('outlet')->where('id_outlet',$request->id)->update([
            'nama_outlet'=>$request->nama,
            'alamat_outlet'=>$request->alamat,
            'tlp_outlet'=>$request->tlp,
        ]);

        Alert::success('Berhasil','Berhasil Mengubah Data Outlet');

        return redirect('/admin/list_outlet');

    }

    public function outlet_pdf(){

        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();

        Date::setlocale('ID');
        $tanggal = Date::now()->format('d F Y');
        set_time_limit(300);

        $pdf = PDF::loadview('/pages/admin/manage_outlet/outlet_pdf',compact('outlet','tanggal'));
        return $pdf->stream('Data Outlet.pdf');
    }


    // member
    public function list_member(){
        $member = DB::table('member')->get();

        return view('/pages/admin/manage_member/list_member',compact('member'));
    }

    public function tambah_member(){

        return view('pages/admin/manage_member/tambah_member');

    }

    public function upload_member(Request $request){

        $member = Member::create([
            'nama_member'=>$request->nama,
            'alamat_member'=>$request->alamat,
            'jenis_kelamin'=>$request->jenkel,
            'tlp_member'=>$request->tlp,
        ]);

        Alert::success('Berhasil','Berhasil Menambah Member');

        return redirect('/admin/list_member');

    }
    public function delete_member($id){

        DB::table('member')->where('id_member',$id)->delete();

        Alert::success('Berhasil','Berhasil Menghapus Data Member');

        return redirect('/admin/list_member');
    }
    public function edit_member($id){

        $member = DB::table('member')->where('id_member',$id)->first();

        return view('/pages/admin/manage_member/edit_member',compact('member'));

    }
    public function update_member(Request $request){

        $member = DB::table('member')->where('id_member',$request->id)->update([
            'nama_member'=>$request->nama,
            'alamat_member'=>$request->alamat,
            'jenis_kelamin'=>$request->jenkel,
            'tlp_member'=>$request->tlp,
        ]);

        Alert::success('Berhasil','Berhasil Menngubah Data Member');

        return redirect('/admin/list_member');

    }
    public function member_pdf(){

        $member = DB::table('member')->get();

        Date::setlocale('ID');
        $tanggal = Date::now()->format('d F Y');
        set_time_limit(300);

        $pdf = PDF::loadview('/pages/admin/manage_member/member_pdf',compact('member','tanggal'));
        return $pdf->stream('Data Member.pdf');
    }


    // paket
    public function list_paket(){
        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();
        $paket = DB::table('paket')->join('outlet','paket.id_outlet','outlet.id_outlet')->get();

        return view('/pages/admin/manage_paket/list_paket',compact('paket','outlet'));
    }

    public function tambah_paket(){

        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();

        return view('/pages/admin/manage_paket/tambah_paket',compact('outlet'));

    }

    public function upload_paket(Request $request){

        $paket = Paket::create([
            'id_outlet'=>$request->outlet,
            'jenis_paket'=>$request->jenis,
            'nama_paket'=>$request->nama,
            'harga_paket'=>$request->harga,
        ]);

        Alert::success('Berhasil','Berhasil Menambah Data Paket');

        return redirect('/admin/list_paket');

    }
    public function delete_paket($id){

        DB::table('paket')->where('id_paket',$id)->delete();

        Alert::success('Berhasil','Berhasil Mennghapus Data Paket');

        return redirect('/admin/list_paket');
    }
    public function edit_paket($id){
        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();
        $paket = DB::table('paket')->where('id_paket',$id)->first();

        return view('/pages/admin/manage_paket/edit_paket',compact('paket','outlet'));

    }
    public function update_paket(Request $request){

        $paket = DB::table('paket')->where('id_paket',$request->id)->update([
            'id_outlet'=>$request->outlet,
            'jenis_paket'=>$request->jenis,
            'nama_paket'=>$request->nama,
            'harga_paket'=>$request->harga,
        ]);

        Alert::success('Berhasil','Berhasil Mengubah Data Paket');

        return redirect('/admin/list_paket');

    }
    public function paket_pdf(Request $request){

        $paket = DB::table('paket')->where('id_outlet',$request->outlet)->get();
        $outlet = DB::table('outlet')->where('id_outlet',$request->outlet)->first();

        Date::setlocale('ID');
        $tanggal = Date::now()->format('d F Y');
        set_time_limit(300);

        $pdf = PDF::loadview('/pages/admin/manage_paket/paket_pdf',compact('paket','tanggal','outlet'));
        return $pdf->stream('Data Paket.pdf');
    }


    // transaksi

    public function menu_transaksi(){

        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();

        return view('/pages/admin/manage_transaksi/menu_transaksi',compact('outlet'));
    }
    
    public function list_transaksi($id){

        // $transaksi = DB::table('transaksi')
        // ->join('member','transaksi.id_member','member.id_member')
        // ->crossJoin('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
        // ->where('transaksi.id_outlet',$id)
        // ->orderBy('transaksi.id_transaksi','desc')
        // ->get();

        $transaksi = Transaksi::where('id_outlet',$id)
        ->join('member','transaksi.id_member','=','member.id_member')
        ->orderBy('transaksi.id_transaksi','desc')
        ->get();


        $outlet_id = $id;

        $total_semua = DB::table('transaksi')
        ->where('transaksi.id_outlet',$id)
        ->sum('total_bayar');

        // dd($transaksi);

        return view('/pages/admin/manage_transaksi/list_transaksi',compact('transaksi','outlet_id','total_semua'));
    }

    public function tambah_transaksi($id){

        $id_transaksi = $id;

        $transaksi = DB::table('transaksi')
        ->where('id_transaksi',$id)
        ->first();
        $tr = DB::table('transaksi')
        ->join('member','transaksi.id_member','member.id_member')
        ->where('id_transaksi',$id)
        ->first();
        $cek = $transaksi->id_outlet;

        $paket = DB::table('paket')->where('id_outlet',$cek)->get();
        
        $detail = DB::table('detail_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('id_transaksi',$id)->get();
        $cek_detail = DB::table('detail_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('id_transaksi',$id)->count();
        
        $total = DB::table('detail_transaksi')
        ->where('id_transaksi',$id)->sum('total_harga');

        $member = DB::table('member')->get();

        $outlet = DB::table('outlet')->where('id_outlet', '<>', 0)->get();

        return view('pages/admin/manage_transaksi/tambah_transaksi',compact('outlet','member','id_transaksi','transaksi','paket','detail','total','tr','cek_detail'));

    }
    
    public function upload_transaksi($outlet){
        $transaksi = DB::table('transaksi')->insert([
            'tgl_transaksi'=>date('Y-m-d H:i:s'),
            'id_outlet'=>$outlet,
            'status_transaksi'=>'Baru',
            'pembayaran'=>'Belum Dibayar'
        ]);
        $id = DB::table('transaksi')->max('id_transaksi');
        return redirect('/admin/list_transaksi/tambah_transaksi/'.$id);
    }

    public function update_transaksi(Request $request){

        $pajak = $request->total * 5/100;

        $transaksi = DB::table('transaksi')
        ->where('id_transaksi',$request->id_transaksi)
        ->update([
            'kode_invoice'=>$request->invoice,
            'id_member'=>$request->member,
            'batas_waktu'=>$request->batas_waktu,
            'pajak_transaksi'=>$pajak,
            'biaya_tambahan'=>$request->biaya_tambahan,
            'id_user'=>Auth::user()->id
        ]);
        $cek = DB::table('transaksi')->where('kode_invoice',$request->invoice)->first();

        Alert::success('Berhasil','Berhasil Menyimpan Data Transaksi');

        return redirect('/admin/list_transaksi/tambah_transaksi/'.$request->id_transaksi);

    }
    public function update_biaya(Request $request){

        $pajak = $request->total * 5/100;

        $transaksi = DB::table('transaksi')
        ->where('id_transaksi',$request->id_transaksi)
        ->update([
            'diskon_transaksi'=>$request->diskon_transaksi,
            'pajak_transaksi'=>$pajak,
            'biaya_tambahan'=>$request->biaya_tambahan
        ]);
        $cek = DB::table('transaksi')->where('kode_invoice',$request->invoice)->first();

        Alert::success('Berhasil','Berhasil Menyimpan Data Transaksi');

        return redirect('/admin/list_transaksi/tambah_transaksi/'.$request->id_transaksi);

    }
    public function delete_transaksi($id){

        DB::table('transaksi')->where('id_transaksi',$id)->delete();

        Alert::success('Berhasil','Berhasil Menghapus Data Transaksi');

        return redirect('/admin/list_transaksi');
    }
    public function edit_transaksi($id){

        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->first();

        return view('/pages/admin/manage_transaksi/edit_transaksi',compact('Transaksi'));

    }
    public function bayar_transaksi($id){

        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->first();

        DB::table('transaksi')->where('id_transaksi',$id)->update([
            'pembayaran'=>"Dibayar",
            'tgl_bayar'=>date('Y-m-d H:i:s')
        ]);

        $outlet = $transaksi->id_outlet;

        Alert::success('Berhasil','Berhasil Melakukan Pembayaran');

        return redirect('/admin/'.$outlet.'/list_transaksi');

    }
    public function batal_transaksi($id){

        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->first();

        DB::table('transaksi')->where('id_transaksi',$id)->update([
            'pembayaran'=>"Belum Dibayar",
            'tgl_bayar'=>NULL
        ]);

        $outlet = $transaksi->id_outlet;

        Alert::success('Berhasil','Berhasil Melakukan Pembatalan Pembayaran');

        return redirect('/admin/'.$outlet.'/list_transaksi');
        
    }
    public function update_status(Request $request){

        $data = explode('_', $request->data);

        $transaksi = DB::table('transaksi')->where('id_transaksi',$data[0])->update([
            'status_transaksi'=>$data[1]
        ]);

        $result = "";

        return $result;
        
    }
    public function update_status1(Request $request){

        $transaksi = DB::table('transaksi')->where('id_transaksi',$request->id_transaksi)->update([
            'status_transaksi'=>$request->status,
        ]);

        Alert::success('Berhasil','Berhasil Mengganti Status');

        return redirect('/admin/detail_transaksi/'.$request->id_transaksi);
        
    }
    public function update_bayar(Request $request){
        $transaksi = DB::table('transaksi')->where('id_transaksi',$request->id_transaksi)->update([
            'pajak_transaksi'=>$request->pajak,
            'total_bayar'=>$request->total_bayar
        ]);

        $outlet = DB::table('transaksi')->where('id_transaksi',$request->id_transaksi)->first();
        Alert::success('Berhasil','Berhasil Menyimpan Transaksi');

        return redirect('/admin/'.$outlet->id_outlet.'/list_transaksi');
    }

    public function transaksi_pdf(Request $request){

        if ($request->id_outlet == NULL) {
            $transaksi = DB::table('transaksi')
            ->whereBetween('tgl_transaksi',[$request->tgl_awal,$request->tgl_akhir])
            ->join('member','transaksi.id_member','=','member.id_member')
            ->join('outlet','transaksi.id_outlet','=','outlet.id_outlet')
            ->orderBy('transaksi.id_transaksi','desc')
            ->get();
            $outlet = "";
            $total_semua = DB::table('transaksi')
            ->whereBetween('tgl_transaksi',[$request->tgl_awal,$request->tgl_akhir])
            ->sum('total_bayar');
        }else{
            $transaksi = DB::table('transaksi')
            ->where('id_outlet',$request->id_outlet)
            ->whereBetween('tgl_transaksi',[$request->tgl_awal,$request->tgl_akhir])
            ->join('member','transaksi.id_member','=','member.id_member')
            ->orderBy('transaksi.id_transaksi','desc')
            ->get();
            $outlet = DB::table('outlet')->where('id_outlet',$request->id_outlet)->first();
            $total_semua = DB::table('transaksi')
            ->where('id_outlet',$request->id_outlet)
            ->whereBetween('tgl_transaksi',[$request->tgl_awal,$request->tgl_akhir])
            ->sum('total_bayar');
        }

        $awal = $request->tgl_awal;
        $akhir = $request->tgl_akhir;



        Date::setlocale('ID');
        $tanggal = Date::now()->format('d F Y');
        set_time_limit(300);

        $pdf = PDF::loadview('/pages/admin/manage_transaksi/transaksi_pdf',compact('transaksi','awal','akhir','total_semua','tanggal','outlet'));
        return $pdf->stream('Data Transaksi.pdf');
    }


    // Detail Transaksi
    public function tambah_detail($id){

        $transaksi = DB::table('transaksi')
        ->join('member','transaksi.id_member','member.id_member')
        ->where('id_transaksi',$id)
        ->first();
        $cek = $transaksi->id_outlet;
        $paket = DB::table('paket')->where('id_outlet',$cek)->get();
        $detail = DB::table('detail_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('id_transaksi',$id)->get();
        $total = DB::table('detail_transaksi')
        ->where('id_transaksi',$id)->sum('total_harga');

        return view('pages/admin/manage_transaksi/tambah_detail',compact('transaksi','paket','detail','total'));

    }

    public function cek_harga(Request $request){
        
        $cek = DB::table('paket')->where('id_paket',$request->paket)->first();

        return  $cek->harga_paket;
        
    }

    public function upload_detail(Request $request){

        $detail = Detail::create([
            'id_transaksi'=>$request->id_transaksi,
            'id_paket'=>$request->paket,
            'qty'=>$request->qty,
            'total_harga'=>$request->total,
            'keterangan'=>$request->keterangan
        ]);

        Alert::success('Berhasil','Berhasil Menambah Transaksi');

        return redirect('/admin/list_transaksi/tambah_transaksi/'.$request->id_transaksi);

    }

    public function detail_transaksi($id){
        $detail = DB::table('detail_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('id_transaksi',$id)->get();
        
        $total = DB::table('detail_transaksi')
        ->where('id_transaksi',$id)->sum('total_harga');

        $transaksi = DB::table('transaksi')
        ->join('member','transaksi.id_member','member.id_member')
        ->join('outlet','transaksi.id_outlet','outlet.id_outlet')
        ->join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('transaksi.id_transaksi',$id)
        ->first();


        return view('/pages/admin/manage_transaksi/detail_transaksi',compact('transaksi','detail','total'));

    }
    public function invoice($id){

        $detail = DB::table('detail_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('id_transaksi',$id)->get();
        
        $total = DB::table('detail_transaksi')
        ->where('id_transaksi',$id)->sum('total_harga');

        $transaksi = DB::table('transaksi')
        ->join('member','transaksi.id_member','member.id_member')
        ->join('outlet','transaksi.id_outlet','outlet.id_outlet')
        ->join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('transaksi.id_transaksi',$id)
        ->first();

        Date::setlocale('ID');
        $tanggal = Date::now()->format('d F Y');
        set_time_limit(300);

        $pdf = PDF::loadview('/pages/admin/manage_transaksi/invoice',compact('transaksi','detail','total','tanggal'));
        
        return $pdf->stream('Invoice '.$transaksi->kode_invoice.'.pdf');
    }

}
