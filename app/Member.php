<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = "Member";

    protected $fillable = [
        'nama_member', 'alamat_member', 'jenis_kelamin','tlp_member'
    ];

}
