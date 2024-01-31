<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Antrian extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'antrian';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $fillable = [
        'user_id',
        'id_pengajuan_surat', 
        'no_antrian',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
