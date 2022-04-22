<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundationPhotoProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'nama_foto',
    ];

    public function foundation_profiles() {
        return $this->belongsTo(FoundationProfile::class, 'profile_id');
    }
}
