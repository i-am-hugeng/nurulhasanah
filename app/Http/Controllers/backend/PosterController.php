<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poster;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PosterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.poster');
    }
    
    public function dataPoster()
    {
        $show_data = Poster::all();

        return response()->json([
            'show_data' => $show_data,
        ]);
    }

    public function store(Request $request)
    {
        $count_data = Poster::select('id')->count();

        function tambah_data($request)
        {
            $data = $request->all();

            $data_poster = new Poster();
            $data_poster -> status_tampil = $data['status_tampil'];

            //save poster
            $image = $request->nama_poster;
            $image_name = date('YmdHis').' - Poster Acara.'.$image->extension();

            $img = Image::make($image->path())->resize(1024, 768);
    
            $img->save(public_path('/media/images/poster/').$image_name, 90);

            $data_poster -> nama_poster = $image_name;

            $data_poster->save();
        }

        if($count_data != 0)
        {
            $nama_poster = Poster::select('nama_poster')->first();

            $path = public_path('/media/images/poster/').$nama_poster->nama_poster;
            if(File::exists($path))
            {
                File::delete($path);
            }

            Poster::truncate();

            tambah_data($request);
        }
        else
        {
            tambah_data($request);
        }

        return response()->json([]);
    }

    public function update($id)
    {
        $data_poster = Poster::find($id);

        $current_status = $data_poster->status_tampil;

        if($current_status == 0)
        {
            Poster::where('id',$id)->update(
                [
                    'status_tampil' => 1,
                ]
            );
        }
        else
        {
            Poster::where('id',$id)->update(
                [
                    'status_tampil' => 0,
                ]
            );
        }

        $status = Poster::select('status_tampil')->first();

        return response()->json([
            'status' => $status,
        ]);
    }
}    
