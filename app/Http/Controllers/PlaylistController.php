<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Playlist;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class PlaylistController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        if ($request->has('category')){
            $playlists = Playlist::where('category_id', '=', $request->query('category'))->get();
        } else {
            $playlists = Playlist::all();
        }
        $playlistCategories = Category::all();
        Return view( 'home', ['playlists'=>$playlists, 'categories' => $playlistCategories]);
//        $data = Playlist::all();
//        return view('home', ['playlists'=>$data]);
    }

//    public function overview(Request $request) {
//        $playlists = Playlist::all();
//        Return view('overview.overview', ['playlists' => $playlists]);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        $playlistCategories = Category::all();
        return view('create', ['categories' => $playlistCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function store(Request $request) {
        //validate
        $request->validate([
            'name'=> 'required',
            'category_id'=>'nullable',
            'description'=> 'nullable'
//            'cover_image'=>'required'
        ]);
        $playlist = new Playlist();
        $playlist-> name = $request->input('name');
        $playlist->description = $request->input('description');
        $playlist->category_id = $request->input('category_id');
        $playlist->user_id = Auth::user()->id;
        $playlist->save();
        return redirect()->route('playlist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id) {
        $playlists = $id;
        return view('overview.detail', ['playlists' => Playlist::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id) {
//        if ($playlists->user_id === Auth::id()) {
//                return view('editview');
//        } else {
//            return redirect(route('playlist.index'));
//        }

        $category = Category::all();
        return view('editview', ['playlists' => Playlist::find($id), 'categories' => $category]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @return \Illuminate\Http\RedirectResponse
     */
    public function search(Request $request) {
        $playlists = Playlist::where('name', 'like', '%' . $request->other . '%')
            ->orWhere('description', 'like', '%' . $request->other . '%')
            ->get();
        $playlistCategories = Category::all();
        return view('home', compact('playlists'), ['categories' => $playlistCategories]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        $request->validate([
            'name'=> 'required',
            'category_id'=>'required',
            'description'=> 'nullable'
//            'cover_image'=>'required'
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
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Playlist $datas) {
        $datas->delete();
        return redirect('overview.overview')->with('message','verwijderd');
    }
}
