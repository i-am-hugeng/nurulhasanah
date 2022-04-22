<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FosterChild;

class AnakAsuhController extends Controller
{
    public function index()
    {
        return view('frontend.anak-asuh');
    }

    public function kontenAnakAsuh()
    {
        $anak_asuh = DB::table('foster_children')
        ->select('id','nama_anak','tanggal_lahir','jenis_kelamin','tingkat_pendidikan','nama_sekolah','status_asuh','foto')
        ->orderBy('nama_anak','asc')->get();

        $total_anak_sd = FosterChild::where('tingkat_pendidikan','=','Sekolah Dasar / Madrasah Ibtidaiah')->count();

        $total_anak_smp = FosterChild::where('tingkat_pendidikan','=','Sekolah Menengah Pertama / Madrasah Tsanawiyah')->count();

        $total_anak_sma = FosterChild::where('tingkat_pendidikan','=','Sekolah Menengah Atas / Madrasah Aliyah')->count();

        return response()->json([
            'anak_asuh' => $anak_asuh,
            'total_anak_sd' => $total_anak_sd,
            'total_anak_smp' => $total_anak_smp,
            'total_anak_sma' => $total_anak_sma,
        ]);
    }

    public function detailAnakAsuh($id)
    {
        $detail_anak = FosterChild::findOrFail($id);

        return response()->json([
            'detail_anak' => $detail_anak,
        ]);
    }
}
