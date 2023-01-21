<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table='t_riwayat_diklat';
    protected $primaryKey = 'id_t_diklat';
    protected $fillable = ['pegawai_id','diklat_id','nama_kursus','tempat','jumlah_jam','tanggal_kursus','institusi_penyelenggara','nomor_sertifikat','tgl_sertifikat','tanggal_selesai_kursus','keterangan','file_sertifikat'];

    public function pilihpegawai()
    {
        return $this->belongsTo(Pegawai::class,'pegawai_id','id');
    }
    public function pilihdiklat()
    {
        return $this->belongsTo(Diklat::class,'diklat_id','id_diklat');
    }
}
