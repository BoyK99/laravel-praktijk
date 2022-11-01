<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Playlist;
use Auth;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->has('category')) {
            $playlists = Playlist::where('category_id', '=', $request->query('category'))->get();
        } else {
            $playlists = Playlist::all();
        }
        $playlistCategories = Category::all();
        return view('home', ['playlists' => $playlists, 'categories' => $playlistCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $playlistCategories = Category::all();
        return view('playlist.create', ['categories' => $playlistCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function store(Request $request) {
        //validate
        $request->validate([
            'name'=> 'required',
            'category_id'=>'nullable',
            'description'=> 'nullable'
        ]);
        if ($request->hasFile('image')){

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);

            $request->file('image')->storePublicly('image', 'public');

            $image = new Playlist([
                "category_id" => $request->get('category_id'),
                "description" => $request->get('description'),
                "name" => $request->get('name'),
                "image" => $request->file('image')->hashName(),
                "user_id" => Auth::user()->id
            ]);

            $image->save();
        } else {
            $playlist = new Playlist();
            $playlist-> name = $request->input('name');
            $playlist->description = $request->input('description');
            $playlist->category_id = $request->input('category_id');
            $playlist->user_id = Auth::user()->id;
            $playlist->save();
        }
        return redirect()->route('playlist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $playlists = $id;
        $comments = Comment::where('playlist_id', $id)->get();
        return view('playlist.detail', ['playlists' => Playlist::find($id), 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = Category::all();
        return view('playlist.editview', ['playlists' => Playlist::find($id), 'categories' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @return \Illuminate\Http\RedirectResponse
     */
    public function search(Request $request)
    {
        $playlists = Playlist::where('name', 'like', '%' . $request->other . '%')
            ->orWhere('description', 'like', '%' . $request->other . '%')
            ->orWhere('user_id', 'like', '%' . $request->other . '%') //TODO: Hier nog fixen dat je op username kan zoeken ipv user_id!
            ->get();
        $playlistCategories = Category::all();
        return view('home', compact('playlists'), ['categories' => $playlistCategories]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'nullable'
        ]);

        $playlist = Playlist::find($id);
        $playlist->name = $request->input('name');
        $playlist->description = $request->input('description');
        $playlist->category_id = $request->input('category_id');
        $playlist->save();
        return redirect('playlist')->with('success', 'playlist edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete();
        return redirect()->route('admin.overview')->with('message', 'verwijderd');
    }

    public function toggleVisibility($id)
    {
        $playlist = Playlist::find($id);
        $playlist->active= !$playlist->active;
        $playlist->save();
        session()->flash('alert', 'Toggled Playlist!');

        return redirect(route('admin.overview'));
    }
}
