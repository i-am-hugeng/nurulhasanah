<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('frontend.beranda');
    }

    public function kontenBeranda()
    {
        $poster = DB::table('posters')->select('nama_poster')->where('status_tampil','=',1)->first();

        $kegiatan_terbaru = DB::table('activities')->join('activity_photos','activities.id','=','activity_photos.activity_id')
        ->select('activities.id','activities.judul','activities.uraian','activities.tanggal','activity_photos.nama_foto')
        ->groupBy('activities.id')
        ->orderBy('activities.tanggal','desc')
        ->limit(4)->get();

        $statistik_anak = DB::table('foster_children')
        ->selectRaw('COUNT(foster_children.id) AS total_anak')
        ->selectRaw('COUNT(CASE WHEN foster_children.jenis_kelamin = "Laki-laki" THEN 1 END) AS total_laki')
        ->selectRaw('COUNT(CASE WHEN foster_children.jenis_kelamin = "Perempuan" THEN 1 END) AS total_perempuan')
        ->selectRaw('COUNT(CASE WHEN foster_children.tingkat_pendidikan = "Sekolah Dasar / Madrasah Ibtidaiah" THEN 1 END) AS total_sd')
        ->selectRaw('COUNT(CASE WHEN foster_children.tingkat_pendidikan = "Sekolah Menengah Pertama / Madrasah Tsanawiyah" THEN 1 END) AS total_smp')
        ->selectRaw('COUNT(CASE WHEN foster_children.tingkat_pendidikan = "Sekolah Menengah Atas / Madrasah Aliyah" THEN 1 END) AS total_sma')
        ->selectRaw('COUNT(CASE WHEN foster_children.status_asuh = "Yatim Piatu" THEN 1 END) AS total_yatim_piatu')
        ->selectRaw('COUNT(CASE WHEN foster_children.status_asuh = "Yatim" THEN 1 END) AS total_yatim')
        ->selectRaw('COUNT(CASE WHEN foster_children.status_asuh = "Piatu" THEN 1 END) AS total_piatu')
        ->selectRaw('COUNT(CASE WHEN foster_children.status_asuh = "Dhuafa" THEN 1 END) AS total_dhuafa')
        ->get();

        return response()->json([
            'poster' => $poster,
            'kegiatan_terbaru' => $kegiatan_terbaru,
            'statistik_anak' => $statistik_anak,
        ]);
    }

    public function kontenDokumentasi($id)
    {
        $dokumentasi = DB::table('activities')->join('activity_photos','activities.id','=','activity_photos.activity_id')
        ->select('activities.judul','activities.uraian','activities.tanggal','activity_photos.nama_foto','activity_photos.keterangan')
        ->where('activities.id','=',$id)->get();

        return response()->json([
            'dokumentasi' => $dokumentasi,
        ]);
    }
}
