<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $fillable = [
        'id_induk',
        'nama',
        'icon',
        'url',
    ];
}
