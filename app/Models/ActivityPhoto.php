<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'nama_foto',
        'thumbnail',
        'keterangan',
    ];

    public function activities() {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
