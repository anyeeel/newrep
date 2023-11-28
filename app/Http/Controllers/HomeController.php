<?php

namespace App\Http\Controllers;

use App\Models\Resolutions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function adminHome() {
        // return view('admin-home');
        $pakigsayudResolutions = Resolutions::where('category', 'pakigsayud')->get();
        $formGuidesResolutions = Resolutions::where('category', 'forms/guides')->get();
        $downloadableFilesResolutions = Resolutions::where('category', 'downloadable files')->get();
    
        return view('admin-home', compact('pakigsayudResolutions', 'formGuidesResolutions', 'downloadableFilesResolutions'));
    }

}
