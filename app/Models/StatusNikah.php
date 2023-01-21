<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusNikah extends Model
{
    use HasFactory;
    protected $table='m_statusnikah';
    protected $primaryKey = 'status_nikah_id';
}
