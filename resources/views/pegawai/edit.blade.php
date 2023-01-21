{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
@section('action')

@endsection
@section('content')

@if (session('message')) 
<div class="alert alert-success">{{ session('message') }} </div>
@endif
<div class="nk-fmg-body-head d-none d-lg-flex">
    <div class="nk-fmg-search">
        <!-- <em class="icon ni ni-search"></em> -->
        <!-- <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search files, folders"> -->
        <h4 class="card-title text-primary"><i class='{{$icon}}' data-toggle='tooltip' data-placement='bottom' title='{{$subtitle}}'></i>  {{strtoupper($subtitle)}}</h4>
    </div>
    <div class="nk-fmg-actions">
        <div class="btn-group">
            <!-- <a href="#" target="_blank" class="btn btn-sm btn-success"><em class="icon ti-files"></em> <span>Export Data</span></a> -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDefault">Modal Default</button> -->
            <!-- <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalDefault"><em class="icon ti-file"></em> <span>Filter Data</span></a> -->
            <!-- <a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="filtershow()"><em class="icon ti-file"></em> <span>Filter Data</span></a> -->
            <a href="{{ route('crud2.list') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em class="icon fas fa-arrow-left"></em> <span>Kembali</span></a>
        </div>
    </div>

</div>
<div class="row gy-3 d-none" id="loaderspin">
    <div class="col-md-12">
        <div class="col-md-12" align="center">
            &nbsp;
        </div>
        <div class="d-flex align-items-center">
          <div class="col-md-12" align="center">
            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
          </div>
        </div>
        <div class="col-md-12" align="center">
            <strong>Loading...</strong>
        </div>
    </div>
</div>
<div class="card d-none" id="filterrow">
    <div class="card-body" style="background:#f7f9fd">
        <div class="row gy-3" >
            
        </div>
    </div>
    <!-- <div class="card-footer" style="background:#fff" align="right"> -->
    <div class="card-footer" style="background:#f7f9fd; padding-top:0px !important;">
        <div class="btn-group">
            <!-- <a href="javascript:void(0)" class="btn btn-sm btn-dark" onclick="filterclear()"><em class="icon ti-eraser"></em> <span>Clear Filter</span></a> -->
            <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="filterdata()"><em class="icon ti-reload"></em> <span>Submit Filter</span></a>
        </div>
    </div>
</div>

<!-- <div class="nk-fmg-body-content"> -->
    <div class="nk-fmg-quick-list nk-block">
        <div class="card">
            <div class="card-body">
            <form class="forminput" method="POST" action="{{ url('crud2') }}/{{ $data['id'] }}">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" class="form-control" id="kode" placeholder="Kode" name="kode" value="{{ $data['kode'] }}">
                </div>
                <div class="form-group">
                    <label for="no_induk">No Induk</label>
                    <input type="text" class="form-control" id="no_induk" placeholder="No Induk" name="no_induk" value="{{ $data['no_induk'] }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{ $data['nama'] }}">
                </div>
                <div class="form-group">
                    <label for="nama_tercetak">Nama Tercetak</label>
                    <input type="text" class="form-control" id="nama_tercetak" placeholder="Nama Tercetak" name="nama_tercetak" value="{{ $data['nama_tercetak'] }}">
                </div>
                <div class="form-group">
                    <label for="gelar_depan">Gelar Depan</label>
                    <input type="text" class="form-control" id="gelar_depan" placeholder="Gelar Depan" name="gelar_depan" value="{{ $data['gelar_depan'] }}">
                </div>
                <div class="form-group">
                    <label for="gelar_belakang">Gelar Belakang</label>
                    <input type="text" class="form-control" id="gelar_belakang" placeholder="Gelar Belakang" name="gelar_belakang" value="{{ $data['gelar_belakang'] }}">
                </div>
                <div class="form-group">
                    <label for="status_pegawai_id">Status Pegawai</label>
                    <select class="form-control" name="status_pegawai_id" value="{{ $data['status_pegawai_id'] }}">
                        @foreach($m_statuspegawai as $a)
                        <option value= "{{ $a->id }}" {{ $data->status_pegawai_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_profesi_id">Jenis Profesi</label>
                    <select class="form-control" name="jenis_profesi_id" value="{{ $data['jenis_profesi_id'] }}">
                        @foreach($m_jenis_profesi as $a)
                        <option value= "{{ $a->id }}" {{ $data->jenis_profesi_id == $a->id ? 'selected' : '' }}>{{ $a->nama_profesi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="spesialisasi_id">Spesialis</label>
                    <select class="form-control" name="spesialisasi_id" value="{{ $data['spesialisasi_id'] }}">
                        @foreach($m_spesialisasi as $a)
                        <option value= "{{ $a->id }}" {{ $data->spesialisasi_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_spesialisasi_id">Sub Spesialis</label>
                    <select class="form-control" name="sub_spesialisasi_id" value="{{ $data['sub_spesialisasi_id'] }}">
                        @foreach($m_subspesialisasi as $a)
                        <option value= "{{ $a->id }}" {{ $data->sub_spesialisasi_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="qualifikasi_id">Kualifikasi</label>
                    <select class="form-control" name="qualifikasi_id" value="{{ $data['qualifikasi_id'] }}">
                        @foreach($m_kualifikasi as $a)
                        <option value= "{{ $a->id }}" {{ $data->qualifikasi_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pendidikan_terakhir_id">Pendidikan Terakhir</label>
                    <select class="form-control" name="pendidikan_terakhir_id" value="{{ $data['pendidikan_terakhir_id'] }}">
                        @foreach($m_pendidikan as $a)
                        <option value= "{{ $a->id }}" {{ $data->pendidikan_terakhir_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jabatan_fungsional_terakhir">Jabatan Fungsional Terakhir</label>
                    <input type="text" class="form-control" id="jabatan_fungsional_terakhir" placeholder="Jabatan Fungsional" name="jabatan_fungsional_terakhir" value="{{ $data['jabatan_fungsional_terakhir'] }}">
                </div>
                <div class="form-group">
                    <label for="jabatan_struktural_id">Jabatan Struktural Terakhir</label>
                    <select class="form-control" name="jabatan_struktural_id" value="{{ $data['jabatan_struktural_id'] }}">
                        @foreach($m_jabatan_struktural as $a)
                        <option value= "{{ $a->id }}" {{ $data->jabatan_struktural_id == $a->id ? 'selected' : '' }}>{{ $a->nama_jabatan_singkat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="unit_id">Unit Medik</label>
                    <select class="form-control" name="unit_id" value="{{ $data['unit_id'] }}">
                        @foreach($m_unit_medik as $a)
                        <option value= "{{ $a->id }}" {{ $data->unit_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subunit_id">Sub Unit Medik</label>
                    <select class="form-control" name="subunit_id" value="{{ $data['subunit_id'] }}">
                        @foreach($m_subunit_medik as $a)
                        <option value= "{{ $a->id }}" {{ $data->subunit_id == $a->id ? 'selected' : '' }}>{{ $a->nama_subunit }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" value="{{ $data['tempat_lahir'] }}">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{ $data['tanggal_lahir'] }}">
                </div><br>
                <div class="form-group">
                    <label for="jeniskelamin_id">Jenis Kelamin</label>
                    <select class="form-control" name="jeniskelamin_id" value="{{ $data['jeniskelamin_id'] }}">
                        @foreach($m_jenis_kelamin as $a)
                        <option value= "{{ $a->id }}" {{ $data->jeniskelamin_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="agama_id">Agama</label>
                    <select class="form-control" name="agama_id" value="{{ $data['agama_id'] }}">
                        @foreach($m_agama as $a)
                        <option value= "{{ $a->id }}" {{ $data->agama_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="bahasa_aktif_id">Bahasa Aktif</label>
                    <select class="form-control" name="bahasa_aktif_id" value="{{ $data['bahasa_aktif_id'] }}">
                        @foreach($m_bahasaaktif as $a)
                        <option value= "{{ $a->id }}" {{ $data->bahasa_aktif_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="{{ $data['alamat'] }}">
                </div>
                <div class="form-group">
                    <label for="provinsi_id">Provinsi</label>
                    <select class="form-control" name="provinsi_id" value="{{ $data['provinsi_id'] }}">
                        @foreach($m_provinsi as $a)
                        <option value= "{{ $a->id }}" {{ $data->provinsi_id == $a->id ? 'selected' : '' }}>{{ $a->nama_provinsi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kabupaten_id">Kabupaten</label>
                    <select class="form-control" name="kabupaten_id" value="{{ $data['kabupaten_id'] }}">
                        @foreach($m_kabupaten as $a)
                        <option value= "{{ $a->id }}" {{ $data->kabupaten_id == $a->id ? 'selected' : '' }}>{{ $a->nama_kabupaten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kecamatan_id">Kecamatan</label>
                    <select class="form-control" name="kecamatan_id" value="{{ $data['kecamatan_id'] }}">
                        @foreach($m_kecamatan as $a)
                        <option value= "{{ $a->id }}" {{ $data->kecamatan_id == $a->id ? 'selected' : '' }}>{{ $a->nama_kecamatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="desa_id">Desa</label>
                    <input type="text" class="form-control" id="desa_id" placeholder="Desa" name="desa_id" value="{{ $data['desa_id'] }}">
                </div>
                <div class="form-group">
                    <label for="dusun">Dusun</label>
                    <input type="text" class="form-control" id="dusun" placeholder="Dusun" name="dusun" value="{{ $data['dusun'] }}">
                </div>
                <div class="form-group">
                    <label for="kodepos">Kode Pos</label>
                    <input type="text" class="form-control" id="kodepos" placeholder="Kode Pos" name="kodepos" value="{{ $data['kodepos'] }}">
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" value="{{ $data['nik'] }}">
                </div>
                <div class="form-group">
                    <label for="NPWP">NPWP</label>
                    <input type="text" class="form-control" id="npwp" placeholder="NPWP" name="npwp" value="{{ $data['npwp'] }}">
                </div>
                <div class="form-group">
                    <label for="status_nikah_id">Status Nikah</label>
                    <select class="form-control" name="status_nikah_id" value="{{ $data['status_nikah_id'] }}">
                        @foreach($m_statusnikah as $a)
                        <option value= "{{ $a->id }}" {{ $data->status_nikah_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">File Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div>

                <div class="form-grup">
                    <button type="submit" class="btn btn-success">Update Data</button>
                </div>   
            </form> 
            </div>
        </div>
    </div>
<!-- </div> -->

@endsection