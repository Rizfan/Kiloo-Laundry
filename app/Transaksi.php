<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaksi extends Model
{
    //
    protected $table = "transaksi";

    protected $fillable = [
        'id_transaksi','id_outlet', 'kode_invoice', 'id_member','tgl_transaksi','batas_waktu','tgl_bayar','biaya_tambahan','diskon_transaksi','pajak_transaksi','status_transaksi','pembayaran','id_user'
    ];

    public function detail(){
    	return $this->belongsTo('App\Detail');
    }

}
