<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FosterChild;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image;

class FosterChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        
        if($request->ajax())
        {
            $data = DB::table('foster_children')
            ->select('id','nama_anak','jenis_kelamin','tingkat_pendidikan','status_asuh')
            ->get();

            return DataTables::of($data)
            ->addColumn('aksi', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-warning btn-sm" title="edit" data-toggle="modal" data-target="#modal-edit-anak-asuh"><i class="fa fa-pencil"></i></button>
                           &nbsp;
                           <button type="button" name="hapus" id="'.$data->id.'" class="hapus btn btn-danger btn-sm" title="hapus"><i class="fa fa-trash"></i></button>';
                
                return $button;
            })
            ->rawColumns(['aksi'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('backend.anak-asuh');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $data_anak = new FosterChild();
        $data_anak -> nama_anak = $data['nama_anak'];
        $data_anak -> tanggal_lahir = $data['tanggal_lahir'];
        $data_anak -> jenis_kelamin = $data['jenis_kelamin'];
        $data_anak -> tingkat_pendidikan = $data['tingkat_pendidikan'];
        $data_anak -> nama_sekolah = $data['nama_sekolah'];
        $data_anak -> status_asuh = $data['status_asuh'];

        //save photo file
        $image = $request->foto;
        $image_name = date('YmdHis').' - '.$data['nama_anak'].'.'.$image->extension();

        $img = Image::make($image->path())->resize(454, 567);
   
        $img->save(public_path('/media/images/foster-children/').$image_name, 80);

        $data_anak -> foto = $image_name;

        $data_anak->save();

        return response()->json([]);

    }

    public function edit($id)
    {
        $data = DB::table('foster_children')
        ->select('id','nama_anak','tanggal_lahir','jenis_kelamin','tingkat_pendidikan','nama_sekolah','status_asuh','foto')
        ->where('id','=',$id)
        ->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function update(Request $request ,$id)
    {

        $data = FosterChild::find($id);
        
        $data->nama_anak = $request->input('nama_anak_edit');
        $data->tanggal_lahir = $request->input('tanggal_lahir_edit');
        $data->jenis_kelamin = $request->input('jenis_kelamin_edit');
        $data->tingkat_pendidikan = $request->input('tingkat_pendidikan_edit');
        $data->nama_sekolah = $request->input('nama_sekolah_edit');
        $data->status_asuh = $request->input('status_asuh_edit');

        if($request->hasFile('foto_anak_edit'))
        {
            $path = public_path('/media/images/foster-children/').$data->foto;
            if(File::exists($path))
            {
                File::delete($path);
            }

            //save photo file
            $image = $request->file('foto_anak_edit');
            $image_name = $request->input('nama_anak_edit').' - '.date('YmdHis').'.'.$image->extension();

            $img = Image::make($image->path())->resize(454, 567);
    
            $img->save(public_path('/media/images/foster-children/').$image_name, 80);

            $data -> foto = $image_name;
        }

        $data->update();

        return response()->json([]);

    }

    public function modalHapus($id)
    {
        $data = FosterChild::find($id);
        
        return response()->json([
            'data' => $data,
        ]);
    }

    public function destroy($id)
    {
        $data = FosterChild::find($id);

        $path = public_path('/media/images/foster-children/').$data->foto;
        if(File::exists($path))
        {
            File::delete($path);
        }

        $data->delete();

        return response()->json([]);
    }

    public function lihatDetailAnakAsuh($id)
    {
        $data = DB::table('foster_children')
        ->select('id','nama_anak','tanggal_lahir','jenis_kelamin','tingkat_pendidikan','nama_sekolah','status_asuh','foto')
        ->where('id','=',$id)
        ->get();

        return response()->json([
            'data' => $data,
        ]);
    }

}
