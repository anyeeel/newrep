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
    // Fetch resolutions for Pakigsayud category (adjust as needed)
    $pakigsayudResolutions = Resolutions::where('category', 'pakigsayud')->get();
    
    // Fetch resolutions for Forms/Guides category (adjust as needed)
    $formGuidesResolutions = Resolutions::where('category', 'forms/guides')->get();
    
    // Fetch resolutions for Downloadable Files category (adjust as needed)
    $downloadableFilesResolutions = Resolutions::where('category', 'downloadable files')->get();

    return view('home', compact('pakigsayudResolutions', 'formGuidesResolutions', 'downloadableFilesResolutions'));
    }

    public function adminHome() {
        // return view('admin-home');
        $pakigsayudResolutions = Resolutions::where('category', 'pakigsayud')->get();
        $formGuidesResolutions = Resolutions::where('category', 'forms/guides')->get();
        $downloadableFilesResolutions = Resolutions::where('category', 'downloadable files')->get();
    
        return view('admin-home', compact('pakigsayudResolutions', 'formGuidesResolutions', 'downloadableFilesResolutions'));
    }

}
