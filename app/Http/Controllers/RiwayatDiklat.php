<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\Diklat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatDiklat extends Controller
{
    public function index($id, $nama){
        $icon = 'ni ni-layers-fill';
        $subtitle = 'Riwayat';
        $table_id = 't_riwayat_diklat';
        $p = 'Nama :';
        return view('Riwayat/listriwayat',compact('subtitle','table_id','icon','id','nama','p'));
    }

    public function listData(Request $request){
        $data = Riwayat::with(['pilihpegawai','pilihdiklat'])->where('pegawai_id',$request->id)->get();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/crud4/".$data->id_t_diklat."/".$data->pilihpegawai->nama."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id_t_diklat}\",\"{$data->nim}\",this)' class='btn btn-md btn-danger' data-id='{$data->id_t_diklat}' data-nim='{$data->nim}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function deleteData(Request $request){
        if(Riwayat::destroy($request->id_t_diklat)){
            $response = array('success'=>1,'msg'=>'Berhasil hapus data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menghapus data');
        }
        return $response;
    }

    public function create($id,$nama){
        $icon = 'ni ni-dashlite';
        $m_diklat= Diklat::all();
        $subtitle = 'Tambah Data Diklat';
        $p = 'Nama :';
        return view('Riwayat/create',compact('subtitle','icon','id','m_diklat','nama','p'));
    }

    public function store(Request $request, $nama)
    {
        $request -> validate ([
            'pegawai_id' => 'required',
            'diklat_id' => 'required',
            'nama_kursus' => 'required',
            'tempat' => 'required',
            'jumlah_jam' => 'required',
            'tanggal_kursus' => 'required',


        ],[
            'pegawai_id.required'=> 'pegawai wajib di isi',
            'diklat_id.required'=> 'diklat di isi',
            'nama_kursus.required'=> 'absen harus di isi',
            'tempat.required'=> 'kode bpjs harus di isi',
            'jumlah_jam.required'=> 'nama harus di cantumkan',
            'tanggal_kursus.required'=> 'nama harus di cantumkan',

        ]);

        $file_sertifikat = $request->file('file_sertifikat');
        $file = 'photo'.date('Ymdhis').'.'.$request->file('file_sertifikat')->getClientOriginalExtension();
        $file_sertifikat->move('Dokumen/',$file);

        Riwayat::create ([
        
            'pegawai_id' => $request->pegawai_id,
            'diklat_id' => $request->diklat_id,
            'nama_kursus' => $request->nama_kursus,
            'tempat' => $request->tempat,
            'jumlah_jam' => $request->jumlah_jam,
            'institusi_penyelenggara' => $request->institusi_penyelenggara,
            'nomor_sertifikat' => $request->nomor_sertifikat,
            'tgl_sertifikat' => $request->tgl_sertifikat,
            'tanggal_selesai_kursus' => $request->tanggal_selesai_kursus,
            'keterangan' => $request->keterangan,
            'file_sertifikat' => $file,
        ]);
        return redirect()->route('crud4.list',[$request->pegawai_id, $nama])->with ('message','Berhasil!');
    }

    public function edit(Request $request, $id, $nama){
        $data = Riwayat::find($request->id_t_diklat);
        $m_diklat= Diklat::all();
        $icon = 'ni ni-dashlite';
        $subtitle = 'Edit Data Riwayat';
        return view('Riwayat/edit',compact('subtitle','icon','data','id','m_diklat','nama'));

    }
    
    public function update (Request $request, $id, $nama)
    {
       $pegawai = Riwayat::find($id);
       $pegawai->update($request->all());
       return redirect()->route('crud4.list',[$request->pegawai_id, $nama])->with('message','Data Berhasil Di Update!');
    }
}
