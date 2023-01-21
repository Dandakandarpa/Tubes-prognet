<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanTerakhir extends Model
{
    use HasFactory;
    protected $table='m_pendidikan';
    protected $primaryKey = 'pendidikan_terakhir_id';
}
