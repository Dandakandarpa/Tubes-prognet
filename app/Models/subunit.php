<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subunit extends Model
{
    use HasFactory;
    protected $table='m_subunit_medik';
    protected $primaryKey = 'subunit_id';
}
