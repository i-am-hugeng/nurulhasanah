<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index()
    {
        return view('frontend.kegiatan');
    }

    public function kontenKegiatan()
    {
        $kegiatan = DB::table('activities')
        ->join('activity_photos','activities.id','=','activity_photos.activity_id')
        ->select('activities.id','activities.judul','activities.tanggal','activity_photos.thumbnail')
        ->groupBy('activities.id')
        ->orderBy('activities.tanggal','desc')
        ->orderBy('activities.id','desc')
        ->limit(4)->get();

        $video = DB::table('activities')
        ->join('activity_videos','activities.id','=','activity_videos.activity_id')
        ->select('activity_videos.id','activities.judul','activities.tanggal','activity_videos.nama_video','activity_videos.keterangan')
        ->orderBy('activities.tanggal','desc')
        ->orderBy('activity_videos.id','desc')
        ->limit(2)->get();

        return response()->json([
            'kegiatan' => $kegiatan,
            'video' => $video,
        ]);
    }

    public function detailKegiatan($id)
    {
        $detail_kegiatan = DB::table('activities')
        ->join('activity_photos','activities.id','=','activity_photos.activity_id')
        ->select('activities.id','activities.judul','activities.tanggal','activities.uraian','activity_photos.thumbnail','activity_photos.nama_foto',
        'activity_photos.keterangan')
        ->where('activities.id','=',$id)
        ->get();

        return response()->json([
            'detail_kegiatan' => $detail_kegiatan,
        ]);
    }

    public function muatLebih($id)
    {
        $muat_lebih = DB::table('activities')
        ->join('activity_photos','activities.id','=','activity_photos.activity_id')
        ->select('activities.id','activities.judul','activities.tanggal','activity_photos.thumbnail')
        ->groupBy('activities.id')
        ->orderBy('activities.tanggal','desc')
        ->orderBy('activities.id','desc')
        ->where('activities.id','<',$id)
        ->limit(4)->get();

        $muat_video_lebih = DB::table('activities')
        ->join('activity_videos','activities.id','=','activity_videos.activity_id')
        ->select('activity_videos.id','activities.judul','activities.tanggal','activity_videos.nama_video','activity_videos.keterangan')
        ->orderBy('activity_videos.id','desc')
        ->orderBy('activities.tanggal','desc')
        ->where('activity_videos.id','<',$id)
        ->limit(2)->get();

        return response()->json([
            'muat_lebih' => $muat_lebih,
            'muat_video_lebih' => $muat_video_lebih,
        ]);
    }
}
