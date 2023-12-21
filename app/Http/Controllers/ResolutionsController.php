<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Resolutions;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class ResolutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resolutions = Resolutions::all();
        return view('resolutions.index', compact('resolutions')); // Adjusted path
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resolutions.create'); // Adjusted path
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'memorandum_number' => 'required|unique:resolutions,memorandum_number',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Assuming the photo is an image file
            'file_path' => 'nullable|mimes:pdf,doc,docx', // Allowing PDF, DOC, and DOCX file formats
            'category' => 'required',
        ]);

                // In the store method

                if ($request->hasFile('photo')) {
                    $photo = $request->file('photo'); // Define $photo variable

                    // Your photo upload and storage code here
                    $photoName = time().'.'.$photo->extension();
                    $photoPath = $photo->storeAs('photos', $photoName, 'public');

                    $validatedData['photo'] = $photoPath;
                }

                        if ($request->hasFile('file_path')) {
                            $file = $request->file('file_path');
                            $fileExtension = $file->getClientOriginalExtension();
                            $fileName = 'resolution_' . time() . '.' . $fileExtension;
                            $filePath = $file->storeAs('files', $fileName, 'public');
                            $validatedData['file_path'] = $filePath;
                        }
                    
                        
                        // Create a new resolution
                        $resolution = \App\Models\Resolutions::create($validatedData);
                        // Fetch all resolutions
                    
                        // Redirect to the index view with a success message
                        return redirect()->route('resolutions.index')->with('success', 'Resolution created successfully.');
                        // return redirect()->route('admin.home', ['category' => $request->category])->with('success', 'Resolution created successfully.');

                    }
          

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $resolution = Resolutions::findOrFail($id);
    
        return view('resolutions.show', compact('resolution'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($id)
     {
         // Find the resolution by ID
         $resolution = Resolutions::findOrFail($id);
     
         // Pass the resolution to the 'edit' view
         return view('resolutions.edit', compact('resolution'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'memorandum_number' => 'required|unique:resolutions,memorandum_number,' . $id,
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $resolution = \App\Models\Resolutions::findOrFail($id);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time().'.'.$request->photo->extension();
            $photoPath = $photo->storeAs('photos', $photoName, 'public');
            $validatedData['photo'] = $photoPath;
        }

        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents');
            $resolution->document = $documentPath;
        }

        $resolution->update($validatedData);

        return redirect()->route('resolutions.index')->with('success', 'Resolution updated successfully.');
    }

            // $request->validate([
            //     // Add validation rules for other fields
            // ]);
        
            
    //         // In the update method
    //         $photoPath = $photo->storeAs('photos', $photoName, 'public');
    //         $validatedData['photo'] = $photoPath;

    // //         // Save the uploaded photo
    // // if ($request->hasFile('photo')) {
    // //     $photoPath = $request->file('photo')->store('images/photos', 'public');
    // //     $resolution->photo = basename($photoPath);
    // // }
    
    //     // Handle the uploaded document if it exists
    //     if ($request->hasFile('document')) {
    //         $documentPath = $request->file('document')->store('documents'); // Adjust the storage path as needed
    //         // Update the resolution's document path in the database
    //         $resolution->document = $documentPath;
    //     }
    
    //     // Update the resolution with validated data
    //     $resolution->update($validatedData);
    
    //     return redirect()->route('resolutions.index')->with('success', 'Resolution updated successfully.');
    
    
    

/**
 * Remove the specified resource from storage.
 */
public function destroy($id)
{
    try {
    // Find the resolution by ID
    $resolution = Resolutions::findOrFail($id);

    // Delete the resolution
    $resolution->delete();

    return response()->json(['success' => true, 'message' => 'Resolution deleted successfully.']);
} catch (\Exception $e) {
    return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
} 
}
