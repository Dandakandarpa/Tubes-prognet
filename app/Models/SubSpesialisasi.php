<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSpesialisasi extends Model
{
    use HasFactory;
    protected $table='m_subspesialisasi';
    protected $primaryKey = 'sub_spesialisasi_id';
}
