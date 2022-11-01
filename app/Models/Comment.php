<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'playlist_id'
    ];

    public function post() // playlist_id
    {
        return $this->belongsTo(Playlist::class);
    }

    public function user() // author_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
