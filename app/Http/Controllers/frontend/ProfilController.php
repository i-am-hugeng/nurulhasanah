<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('frontend.profil');
    }

    public function kontenProfil()
    {
        $profil = DB::table('foundation_profiles')->join('foundation_photo_profiles','foundation_profiles.id','=','foundation_photo_profiles.profile_id')
        ->select('foundation_profiles.judul','foundation_profiles.uraian','foundation_photo_profiles.nama_foto')->get();
        
        return response()->json([
            'profil' => $profil,
        ]);
    }
}
