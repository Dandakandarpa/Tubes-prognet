{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
@section('action')

@endsection
@section('content')
<div class="card">
  <div class="card-body">
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Induk    :</label>
        <div class="col-sm-10">
            <p style="margin-top: 5px;">{{ $data['no_induk'] }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama          :</label>
        <div class="col-sm-10">
        <p>{{ $data['nama'] }}</p>
        </div>
    </div>
  
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Tercetak :</label>
        <div class="col-sm-10">
        <p>{{ $data['nama_tercetak'] }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Gelar Depan :</label>
        <div class="col-sm-10">
        <p>{{ $data['gelar_depan'] }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Gelar Belakang :</label>
        <div class="col-sm-10">
        <p>{{ $data['gelar_belakang'] }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Status Pegawai :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihstatuspegawai->nama }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Profesi :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihjenisprofesi->nama_profesi }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Sub :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihsubspesialis->nama }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kualifikasi :</label>
        <div class="col-sm-10">
         <p>{{ $data->pilihkualifikasi->nama }}</p>
         </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Pendidikan Terakhir :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihpendidikanterakhir->nama }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Jabatan Fungsional Terakhir :</label>
        <div class="col-sm-10">
        <p>{{ $data['jabatan_fungsional_terakhir'] }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Jabatan Struktural Terakhir :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihjabatanstrukturalterakhir->nama_jabatan_singkat }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Unit :</label>
        <div class="col-sm-10">
         <p>{{ $data->pilihunit->nama }}</p>
         </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Sub Unit :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihsubunit->nama_subunit }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tempat Lahir :</label>
        <div class="col-sm-10">
         <p>{{ $data['tempat_lahir'] }}</p>
         </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Lahir :</label>
        <div class="col-sm-10">
        <p>{{ $data['tanggal_lahir'] }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihjeniskelamin->nama }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Agama :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihagama->nama }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Bahasa :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihbahasaaktif->nama }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Alamat :</label>
        <div class="col-sm-10">
        <p>{{ $data['alamat'] }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Alamat :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihprovinsi->nama_provinsi }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kabupaten :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihkabupaten->nama_kabupaten }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kecamatan :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihkecamatan->nama_kecamatan }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Desa :</label>
        <div class="col-sm-10">
         <p>{{ $data['desa_id'] }}</p>
         </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Dusun:</label>
        <div class="col-sm-10">
         <p>{{ $data['dusun'] }}</p>
         </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kode Post :</label>
        <div class="col-sm-10">
        <p>{{ $data['kodepos'] }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nik :</label>
        <div class="col-sm-10">
        <p>{{ $data['nik'] }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">npwp :</label>
        <div class="col-sm-10">
        <p>{{ $data['npwp'] }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Status Nikah :</label>
        <div class="col-sm-10">
        <p>{{ $data->pilihstatusnikah->nama }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">File Foto :</label>
        <div class="col-sm-10">
        <img src="Dokumen/{{ $data->file_photo }}" class="img-thumbnail" alt="" style="width:300px;height:300px;">
        </div>
        </div><br>
        <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">File ktp :</label>
        <div class="col-sm-10">
        <img src="Dokumen/{{ $data->file_ktp }}" class="img-thumbnail" alt="" style="width:300px;height:300px;">
        </div>
        </div><br>
        <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">File KK :</label>
        <div class="col-sm-10">
        <img src="Dokumen/{{ $data->file_kk }}" class="img-thumbnail" alt="" style="width:300px;height:300px;">
        </div>
        </div><br>
        <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">File Npwp :</label>
        <div class="col-sm-10">
        <img src="Dokumen/{{ $data->file_npwp }}" class="img-thumbnail" alt="" style="width:300px;height:300px;">
        
        </div>
        </div><br>
    </div>
  </div>
</div>
@endsection

