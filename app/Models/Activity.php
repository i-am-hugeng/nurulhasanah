<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'uraian',
        'tanggal',
    ];

    public function activity_photos() {
        return $this->hasMany(ActivityPhoto::class, 'activity_id');
    }

    public function activity_videos() {
        return $this->hasMany(ActivityVideo::class, 'activity_id');
    }
}
