<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundationProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'uraian',
    ];

    public function foundation_photo_photos() {
        return $this->hasMany(FoundationPhotoProfile::class, 'profile_id');
    }
}
