<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ActivityPhoto;
use App\Models\ActivityVideo;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = DB::table('activities')
            ->leftJoin('activity_photos','activities.id','=','activity_photos.activity_id')
            ->leftJoin('activity_videos','activities.id','=','activity_videos.activity_id')
            ->select('activities.id','activities.judul','activities.uraian','activities.tanggal')
            ->selectRaw('(COUNT(DISTINCT(activity_photos.nama_foto)) + COUNT(DISTINCT(activity_videos.nama_video))) AS total_dokumentasi')
            ->groupBy('activities.id')
            ->get();

            return DataTables::of($data)
            ->addColumn('aksi', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-warning btn-sm disabled" title="edit" data-toggle="modal" data-target="#modal-edit-kegiatan"><i class="fa fa-pencil"></i></button>
                           &nbsp;
                           <button type="button" name="hapus" id="'.$data->id.'" class="hapus btn btn-danger btn-sm" title="hapus"><i class="fa fa-trash"></i></button>';
                
                return $button;
            })
            ->rawColumns(['aksi'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('backend.kegiatan');
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $data_kegiatan = new Activity();
        $data_kegiatan -> judul = $data['judul'];
        $data_kegiatan -> uraian = nl2br($data['uraian']);
        $data_kegiatan -> tanggal = $data['tanggal'];
        $data_kegiatan->save();

        //save dokumentasi & keterangan kegiatan
        $i = 1;
        $j = 1;
        $dokumentasi_kegiatan = $request->file('dokumentasi_kegiatan');
        foreach($dokumentasi_kegiatan as $item => $value) {
            //(file foto)
            if($request->file('dokumentasi_kegiatan')[$item]->getClientMimeType() == 'image/jpeg')
            {
                $foto = $request->file('dokumentasi_kegiatan')[$item];
                $nama_foto = $data['judul'].'-'.$i.'-'.time().'.'.$foto->extension();
                $nama_thumbnail = $data['judul'].'-'.$i.'-'.time().'.'.$foto->extension();
                $rincian_dokumentasi = array(
                    'activity_id' => $data_kegiatan->id,
                    'nama_foto'   => $nama_foto,
                    'thumbnail'   => $nama_thumbnail,
                    'keterangan'  => $data['keterangan_kegiatan'][$item],
                );

                // dd($foto, $nama_foto, $rincian_dokumentasi);

                $img_foto = Image::make($foto->path())->resize(1024, 768);  
                $img_foto->save(public_path('/media/images/activities/photos/photos/').$nama_foto);

                $img_thumbnail = Image::make($foto->path())->resize(200, 150);   
                $img_thumbnail->save(public_path('/media/images/activities/photos/thumbnails/').$nama_thumbnail);

                ActivityPhoto::insert($rincian_dokumentasi);

                $i += 1;
            }
            else
            {
                $video = $request->file('dokumentasi_kegiatan')[$item];
                $nama_video = $data['judul'].'-'.$j.'-'.time().'.'.$video->extension();
                $rincian_dokumentasi = array(
                    'activity_id' => $data_kegiatan->id,
                    'nama_video'  => $nama_video,
                    'keterangan'  => $data['keterangan_kegiatan'][$item],
                );

                // dd($video, $nama_video, $rincian_dokumentasi);

                $video->move(public_path().'/media/images/activities/videos/',$nama_video);

                ActivityVideo::insert($rincian_dokumentasi);

                $j += 1;            
            }

        }

        return response()->json([]);
    }

    public function modalHapus($id)
    {
        $data = Activity::find($id);
        
        return response()->json([
            'data' => $data,
        ]);
    }

    public function destroy($id)
    {
        $data = Activity::find($id);

        $data_photo = ActivityPhoto::where('activity_id','=',$id)->get();
        $data_video = ActivityVideo::where('activity_id','=',$id)->get();

        $count_photo = ActivityPhoto::where('activity_id','=',$id)->count();
        $count_video = ActivityVideo::where('activity_id','=',$id)->count();

        $path_photos = public_path('/media/images/activities/photos/photos/');
        $path_thumbnails = public_path('/media/images/activities/photos/thumbnails/');
        $path_videos = public_path('/media/images/activities/videos/');

        if($count_photo != 0)
        {
            foreach($data_photo as $foto)
            {
                if(File::exists($path_photos.$foto->nama_foto))
                {
                    File::delete($path_photos.$foto->nama_foto);
                }

                if(File::exists($path_thumbnails.$foto->thumbnail))
                {
                    File::delete($path_thumbnails.$foto->thumbnail);
                }
            }
        }

        if($count_video != 0)
        {
            foreach($data_video as $video)
            {
                if(File::exists($path_videos.$video->nama_video))
                {
                    File::delete($path_videos.$video->nama_video);
                }
            }
        }

        $data->delete();

        return response()->json([]);
    }

    public function lihatDetailKegiatan($id)
    {
        $data = Activity::where('id','=',$id)->get();

        $dokumentasi = ActivityPhoto::where('activity_id','=',$id)->get();

        return response()->json([
            'data' => $data,
            'dokumentasi' => $dokumentasi,
        ]);
    }
}
