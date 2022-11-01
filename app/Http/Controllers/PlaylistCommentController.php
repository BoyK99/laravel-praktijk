<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $playlist = Playlist::where('user_id', '=', auth()->user()->id);

        request()->validate([
            'content' => 'required'
        ]);

//        dd($playlist->count());
        if($playlist->count() > 2) {
            $comment = new Comment();
            $comment->user_id = Auth::user()->id;
            $comment->playlist_id = $request->playlist_id;
            $comment->content = $request->input('content');
            $comment->save();
        }
        else {
            $request->session()->flash('alert-error', 'You need to post 3 playlists before you can comment!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($playlist_id, $comment_id)
    {
        // Query delete comment
        $comments = Comment::find($comment_id);
        $comments->delete();

        // Returns to playlist view
        return back();
    }
}
