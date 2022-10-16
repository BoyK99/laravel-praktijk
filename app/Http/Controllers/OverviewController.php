<?php

namespace App\Http\Controllers;

use App\Models\Playlist;

class OverviewController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $playlist = Playlist::all();
        return view('overview', ['Playlist'=>$playlist]);
    }
}
