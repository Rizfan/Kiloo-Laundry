<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    //
    protected $table = "paket";

    protected $fillable = [
        'id_outlet', 'jenis_paket', 'nama_paket','harga_paket'
    ];
}
