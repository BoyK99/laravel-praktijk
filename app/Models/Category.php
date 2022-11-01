<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
//    protected $fillable = [
//        'name',
//        'timestamps',
//        'updated_at',
//        'created_at'
//    ];

    public function playlists() {
        return $this->hasMany(Playlist::class);
    }

    public function name() // author_id
    {
        return $this->belongsTo(Playlist::class, 'category_id');
    }
}
