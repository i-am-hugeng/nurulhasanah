<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoundationProfile;
use App\Models\FoundationPhotoProfile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class FoundationProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.profil-yayasan');
    }
    
    public function tampilProfil()
    {
        $data_profil = FoundationProfile::all();
        $foto_profil = FoundationPhotoProfile::all();

        return response()->json([
            'data_profil' => $data_profil,
            'foto_profil' => $foto_profil,
        ]);    
    }

    public function store(Request $request)
    {
        $count_data = FoundationProfile::select('id')->count();

        function tambah_data($request)
        {
            $data = $request->all();

            $data_profil = new FoundationProfile();
            $data_profil -> judul = $data['judul'];
            $data_profil -> uraian = nl2br($data['uraian']);
            $data_profil->save();

            //save foto profil
            $i = 1;
            $foto_profil = $request->file('nama_foto');
            foreach($foto_profil as $item => $value) {
                //(file foto)
                if($request->file('nama_foto')[$item]->getClientMimeType() == 'image/jpeg')
                {
                    $foto = $request->file('nama_foto')[$item];
                    $nama_foto = $data['judul'].'-'.$i.'-'.time().'.'.$foto->extension();
                    $rincian_foto = array(
                        'profile_id' => $data_profil->id,
                        'nama_foto'   => $nama_foto,
                    );

                    $img_foto = Image::make($foto->path())->resize(1024, 768);  
                    $img_foto->save(public_path('/media/images/profile-foundation-photos/').$nama_foto);

                    FoundationPhotoProfile::insert($rincian_foto);

                    $i += 1;
                }
            }
        }

        if($count_data != 0)
        {
            $data_foto = FoundationPhotoProfile::select('nama_foto')->get();

            foreach($data_foto as $foto)
            {
                $path = public_path('/media/images/profile-foundation-photos/').$foto->nama_foto;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            }

            DB::table('foundation_photo_profiles')->delete();
            DB::table('foundation_profiles')->delete();

            tambah_data($request);
        }

        else
        {
            tambah_data($request);
        }

        return response()->json([]);

    }
}
