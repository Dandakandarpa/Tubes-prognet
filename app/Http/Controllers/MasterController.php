<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\StatusPegawai;
use App\Models\JenisProfesi;
use App\Models\Spesialisasi;
use App\Models\SubSpesialisasi;
use App\Models\kualifikasi;
use App\Models\PendidikanTerakhir;
use App\Models\JabatanStruktural;
use App\Models\Unit;
use App\Models\subunit;
use App\Models\JenisKelamin;
use App\Models\Agama;
use App\Models\BahasaAktif;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\StatusNikah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MasterController extends Controller
{
    public function index(){
        $icon = 'ni ni-layers-fill';
        $subtitle = 'Pegawai';
        $table_id = 'm_pegawai';
        return view('pegawai/list',compact('subtitle','table_id','icon'));
    }

    public function listData(Request $request){
        $data = Pegawai::with('pilihstatuspegawai')->get();
        $datatables = DataTables::of($data);
        return $datatables

                ->addIndexColumn()
                ->addColumn('detail_pegawai', function($data){
                    $detail_pegawai = "";
                    $detail_pegawai .= "<a title='Detail Pegawai' href='/crud2/".$data->id."/view' class='btn btn-outline-info' >Detail</a>";
                    return $detail_pegawai;
                })

                ->addColumn('aksi', function($data){
                    
                    $aksi = "";
                    $aksi .= "<a title='Riwayat Diklat' href='/crud4/".$data->id."/".$data->nama."' class='btn btn-md btn-info'><i class='ti-write' ></i></a> &nbsp";
                    $aksi .= "<a title='Edit Data' href='/crud2/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a> &nbsp"; 
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->nim}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-nim='{$data->nim}' style='margin-top: 5px;'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> &nbsp";
                    return $aksi;
                })
                ->rawColumns(['detail_pegawai','aksi'])
                ->make(true);
    }

    public function deleteData(Request $request){
        if(Pegawai::destroy($request->id)){
            $response = array('success'=>1,'msg'=>'Berhasil hapus data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menghapus data');
        }
        return $response;
    }

    public function create(){
        $icon = 'ni ni-dashlite';
        $m_statuspegawai= StatusPegawai::all();
        $m_jenis_profesi= JenisProfesi::all();
        $m_spesialisasi= Spesialisasi::all();
        $m_subspesialisasi= SubSpesialisasi::all();
        $m_kualifikasi= kualifikasi::all();
        $m_pendidikan= PendidikanTerakhir::all();
        $m_jabatan_struktural= JabatanStruktural::all();
        $m_unit_medik= Unit::all();
        $m_subunit_medik= subunit::all();
        $m_jenis_kelamin= JenisKelamin::all();
        $m_bahasaaktif= BahasaAktif::all();
        $m_agama= Agama::all();
        $m_kecamatan= Kecamatan::all();
        $m_kabupaten= Kabupaten::all();
        $m_provinsi= Provinsi::all();
        $m_statusnikah= StatusNikah::all();
        $subtitle = 'Tambah Data Pegawai';
        return view('pegawai/create',compact('subtitle','icon','m_statuspegawai','m_jenis_profesi','m_spesialisasi','m_subspesialisasi','m_kualifikasi','m_pendidikan','m_jabatan_struktural','m_unit_medik','m_subunit_medik','m_jenis_kelamin','m_agama','m_bahasaaktif','m_kecamatan','m_kabupaten','m_provinsi','m_statusnikah'));
    }

    public function store(Request $request)
    {
        $request -> validate ([
            'kode' => 'required',
            'nama' => 'required',
            'no_induk' => 'required',

        ],[
            'kode.required'=> 'kode wajib di isi',
            'no_induk.required'=> 'nama wajib di isi',
            'nama.required'=> 'no induk di isi',
        ]);

        $file_photo = $request->file('file_photo');
        $photo_jpg  = 'photo'.date('Ymdhis').'.'.$request->file('file_photo')->getClientOriginalExtension();
        $file_photo->move('Dokumen/',$photo_jpg);

        $file_photo = $request->file('file_ktp');
        $photo_2jpg  = 'photo'.date('Ymdhis').'.'.$request->file('file_ktp')->getClientOriginalExtension();
        $file_photo->move('Dokumen/',$photo_2jpg);

        $file_photo = $request->file('file_kk');
        $photo_3jpg  = 'photo'.date('Ymdhis').'.'.$request->file('file_kk')->getClientOriginalExtension();
        $file_photo->move('Dokumen/',$photo_3jpg);

        $file_photo = $request->file('file_npwp');
        $photo_4jpg  = 'photo'.date('Ymdhis').'.'.$request->file('file_npwp')->getClientOriginalExtension();
        $file_photo->move('Dokumen/',$photo_4jpg);
        
    
        Pegawai::create([
        'kode'=> $request->kode,
        'no_induk'=> $request->no_induk,
        'nama'=> $request->nama,
        'nama_tercetak'=> $request->nama_tercetak,
        'gelar_depan'=> $request->gelar_depan,
        'gelar_belakang'=> $request->gelar_belakang,
        'status_pegawai_id'=> $request->status_pegawai_id,
        'jenis_profesi_id'=> $request->jenis_profesi_id,
        'spesialisasi_id'=> $request->kspesialisasi_id,
        'sub_spesialisasi_id'=> $request->sub_spesialisasi_id,
        'qualifikasi_id'=> $request->qualifikasi_id,
        'pendidikan_terakhir_id'=> $request->pendidikan_terakhir_id,
        'jabatan_fungsional_terakhir'=> $request->jabatan_fungsional_terakhir,
        'jabatan_struktural_id'=> $request->jabatan_struktural_id,
        'unit_id'=> $request->unit_id,
        'subunit_id'=> $request->subunit_id,
        'tempat_lahir'=> $request->tempat_lahir,
        'tanggal_lahir'=> $request->tanggal_lahir,
        'jeniskelamin_id'=> $request->jeniskelamin_id,
        'agama_id'=> $request->agama_id,
        'bahasa_aktif_id'=> $request->bahasa_aktif_id,
        'alamat'=> $request->alamat,
        'provinsi_id'=> $request->provinsi_id,
        'kabupaten_id'=> $request->kabupaten_id,
        'kecamatan_id'=> $request->kecamatan_id,
        'desa_id'=> $request->desa_id,
        'dusun'=> $request->dusun,
        'kodepos'=> $request->kodepos,
        'nik'=> $request->nik,
        'npwp'=> $request->npwp,
        'file_photo'=> $photo_jpg,
        'file_ktp'=> $photo_2jpg,
        'file_kk'=> $photo_3jpg,
        'file_npwp'=> $photo_4jpg,
        'status_nikah_id'=> $request->status_nikah_id
     ]);
        return redirect('crud2')->with('message','Berhasil!');
    }
    
    public function view(Request $request){
        $data = Pegawai::find($request->id);
        $icon = 'ni ni-dashlite';
        return view('pegawai/view',compact('data','icon'));
    }


    public function edit(Request $request){
        $data = Pegawai::find($request->id);
        $icon = 'ni ni-dashlite';
        $m_statuspegawai= StatusPegawai::all();
        $m_jenis_profesi= JenisProfesi::all();
        $m_spesialisasi= Spesialisasi::all();
        $m_subspesialisasi= SubSpesialisasi::all();
        $m_kualifikasi= kualifikasi::all();
        $m_pendidikan= PendidikanTerakhir::all();
        $m_jabatan_struktural= JabatanStruktural::all();
        $m_unit_medik= Unit::all();
        $m_subunit_medik= subunit::all();
        $m_jenis_kelamin= JenisKelamin::all();
        $m_agama= Agama::all();
        $m_bahasaaktif= BahasaAktif::all();
        $m_kecamatan= Kecamatan::all();
        $m_kabupaten= Kabupaten::all();
        $m_provinsi= Provinsi::all();
        $m_statusnikah= StatusNikah::all();
        $subtitle = 'Edit Data Pegawai';
        $len = isset($cOTLdata['char_data']) ? count($cOTLdata['char_data']) : 0;
        return view('pegawai/edit',compact('subtitle','icon','data','len','m_statuspegawai','m_jenis_profesi','m_spesialisasi','m_subspesialisasi','m_kualifikasi','m_pendidikan','m_jabatan_struktural','m_unit_medik','m_subunit_medik','m_jenis_kelamin','m_agama','m_bahasaaktif','m_kecamatan','m_kabupaten','m_provinsi','m_statusnikah'));

    }
    
    public function update (Request $request,$id)
    {
       $pegawai = Pegawai::find($id);
       $pegawai->update($request->all());
       return redirect('crud2')->with('message','Data Berhasil Di Update!');
    }
    

}