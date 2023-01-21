<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table='m_pegawai';
    protected $fillable = ['kode','no_induk','nama','nama_tercetak','gelar_depan','gelar_belakang','status_pegawai_id','jenis_profesi_id','spesialisasi_id','sub_spesialisasi_id','qualifikasi_id','pendidikan_terakhir_id','jabatan_fungsional_terakhir','jabatan_struktural_id','unit_id','subunit_id','tempat_lahir','tanggal_lahir','jeniskelamin_id','agama_id','bahasa_aktif_id','alamat','provinsi_id','kabupaten_id','kecamatan_id','desa_id','dusun','kodepos','nik','npwp','file_photo','file_ktp','file_kk','file_npwp','status_nikah_id'];
    public function pilihstatuspegawai()
    {
        return $this->belongsTo(StatusPegawai::class,'status_pegawai_id','id');
    }
    public function pilihjenisprofesi()
    {
        return $this->belongsTo(JenisProfesi::class,'jenis_profesi_id','id');
    }
    public function pilihspesialis()
    {
        return $this->belongsTo(Spesialisasi::class,'spesialisasi_id','id');
    }
    public function pilihsubspesialis()
    {
        return $this->belongsTo(SubSpesialisasi::class,'sub_spesialisasi_id','id');
    }
    public function pilihkualifikasi()
    {
        return $this->belongsTo(kualifikasi::class,'qualifikasi_id','id');
    }
    public function pilihpendidikanterakhir()
    {
        return $this->belongsTo(PendidikanTerakhir::class,'pendidikan_terakhir_id','id');
    }
    public function pilihjabatanstrukturalterakhir()
    {
        return $this->belongsTo(JabatanStruktural::class,'jabatan_struktural_id','jabatan_id');
    }
    public function pilihunit()
    {
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
    public function pilihsubunit()
    {
        return $this->belongsTo(subunit::class,'subunit_id','id');
    }
    public function pilihjeniskelamin()
    {
        return $this->belongsTo(JenisKelamin::class,'jeniskelamin_id','id');
    }
    public function pilihagama()
    {
        return $this->belongsTo(Agama::class,'agama_id','id');
    }
    public function pilihbahasaaktif()
    {
        return $this->belongsTo(BahasaAktif::class,'bahasa_aktif_id','id');
    }
    public function pilihkecamatan()
    {
        return $this->belongsTo(Kecamatan::class,'kecamatan_id','id');
    }
    public function pilihkabupaten()
    {
        return $this->belongsTo(Kabupaten::class,'kabupaten_id','id');
    }
    public function pilihprovinsi()
    {
        return $this->belongsTo(Provinsi::class,'provinsi_id','id');
    }
    public function pilihstatusnikah()
    {
        return $this->belongsTo(StatusNikah::class,'status_nikah_id','id');
    }
    
}
