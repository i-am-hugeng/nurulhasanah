<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FosterChild extends Model
{
    use HasFactory;

    // protected $table = "foster_children";
    // protected $primaryKey = "id";
    protected $fillable = [
        'nama_anak',
        'tanggal_lahir',
        'jenis_kelamin',
        'tingkat_pendidikan',
        'nama_sekolah',
        'status_asuh',
        'foto',
    ];
}
