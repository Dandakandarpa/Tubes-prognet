{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
@section('action')

@endsection
@section('content')
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
            <a href="{{ route('crud4.list', ['id' => $id, $nama]) }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em class="icon fas fa-arrow-left"></em> <span>Kembali</span></a>
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
            <p>{{ $p }}{{ $nama }}</p>
            <form id="create" method="POST" action="{{ route('crud4.store', $nama) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="pegawai_id">Pegawai Id</label>
                <input type="text" class="form-control" id="pegawai_id" placeholder="Id Pegawai" name="pegawai_id" value="{{ $id }}">
                </div>
                <div class="form-group">
                 <label for="diklat_id">Diklat</label>
                 <select class="form-control" name="diklat_id" >
                    @foreach($m_diklat as $a)
                        <option value= "{{ $a->id_diklat }}"> {{ $a->nama_diklat }}</option>
                      @endforeach
                </select>
                </div>
                <div class="form-grup">
                <label for="nama_kursus">Nama Kursus</label>
                    <input type="text" class="form-control" id="nama_kursus" placeholder="Nama Kursus" name="nama_kursus">
                </div><br>
                <div class="form-group">
                    <label for="tempat">Tempat</label>
                    <input type="text" class="form-control" id="tempat" placeholder="Tempat" name="tempat">
                </div>
                <div class="form-group">
                    <label for="jumlah_jam">Jumlah Jam</label>
                    <input type="text" class="form-control" id="jumlah_jam" placeholder="Jumlah Jam" name="jumlah_jam">
                </div>
                <div class="form-group">
                    <label for="tanggal_kursus">Tanggal Kursus</label>
                    <input type="date" class="form-control" id="tanggal_kursus" placeholder="Tanggal Kursus" name="tanggal_kursus">
                </div>
                <div class="form-group">
                    <label for="institusi_penyelenggara">Institusi Penyelenggara</label>
                    <input type="text" class="form-control" id="institusi_penyelenggara" placeholder="Institusi Penyelenggara" name="institusi_penyelenggara">
                </div>
                <div class="form-group">
                    <label for="nomor_sertifikat">Nomor Sertifikat</label>
                    <input type="text" class="form-control" id="nomor_sertifikat" placeholder="Nomor Sertifikat" name="nomor_sertifikat">
                </div>
                <div class="form-group">
                    <label for="tgl_sertifikat">Tanggal Sertifikat</label>
                    <input type="date" class="form-control" id="tgl_sertifikat" placeholder="Tanggal Sertifikat" name="tgl_sertifikat">
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai_kursus">Tanggal Selesai Kursus</label>
                    <input type="date" class="form-control" id="tanggal_selesai_kursus" placeholder="Tanggal Selesai Kursus" name="tanggal_selesai_kursus">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan">
                </div>

                <div class="form-group">
                    <label for="file">File Sertifikat</label>
                    <input type="file" class="form-control" id="file" name="file_sertifikat" accept="file/*">
                    
                </div>



                <div class="form-grup">
                    <button type="button" onclick="update(this)" class="btn btn-primary">Simpan</button>
                </div>
                
                </form>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection
@push('script')
<script>
    function update() {
    CustomSwal.fire({ 
        icon:'question',
        text: 'Apakah Data Anda sudah Benar',
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            $("#create").submit()

        }else{    
        }
    });
    }
</script>
@endpush

