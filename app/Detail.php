<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $table = "detail_transaksi";

    protected $fillable = [
        'id_transaksi', 'id_paket', 'qty','keterangan','total_harga'
    ];


    public function transaksi(){
    	return $this->hasMany('App\Transaksi');
    }
}
