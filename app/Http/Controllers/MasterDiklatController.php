<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\JenisDiklat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MasterDiklatController extends Controller
{
    public function index(){
        $icon = 'ni ni-layers-fill';
        $subtitle = 'Diklat';
        $table_id = 'm_diklat';
        return view('diklat/listdiklat',compact('subtitle','table_id','icon'));
    }

    public function listData(Request $request){
        $data= Diklat::with('pilihjenisdiklat')->get();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/crud3/".$data->id_diklat."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id_diklat}\",\"{$data->nim}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-nim='{$data->nim}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function deleteData(Request $request){
        if(Diklat::destroy($request->id_diklat)){
            $response = array('success'=>1,'msg'=>'Berhasil hapus data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menghapus data');
        }
        return $response;
    }

    public function create(){
        $icon = 'ni ni-dashlite';
        $m_jenis_diklat= JenisDiklat::all();
        $subtitle = 'Tambah Data Diklat';
        return view('diklat/creatediklat',compact('subtitle','icon','m_jenis_diklat'));
    }

    public function store(Request $request)
    {
        $request -> validate ([
            'no_urut' => 'required',
            'nama_diklat' => 'required',
            'jenis_diklat_id' => 'required',


        ],[
            'no_urut'=> 'no urut wajib di isi',
            'nama_diklat'=> 'nama diklat wajib di isi',
            'jenis_diklat_id'=> 'jenis diklat di isi',

        ]);
        Diklat::create($request->all());
        return redirect('crud3')->with('message','Berhasil!');
    }

    public function edit(Request $request){
        $data = Diklat::find($request->id_diklat);
        $icon = 'ni ni-dashlite';
        $m_jenis_diklat= JenisDiklat::all();
        $subtitle = 'Edit Data Diklat';
        $len = isset($cOTLdata['char_data']) ? count($cOTLdata['char_data']) : 0;
        return view('diklat/editdiklat',compact('subtitle','icon','data','len','m_jenis_diklat'));

    }
    
    public function update (Request $request,$id_diklat)
    {
       $diklat = Diklat::find($id_diklat);
       $diklat->update($request->all());
       return redirect('crud3')->with('message','Data Berhasil Di Update!');
    } 
}
