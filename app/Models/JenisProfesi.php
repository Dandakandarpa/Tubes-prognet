<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProfesi extends Model
{
    use HasFactory;
    protected $table='m_jenis_profesi';
    protected $primaryKey = 'jenis_profesi_id';
}
