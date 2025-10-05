<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Facades\Storage;

class AdminExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::latest()->paginate(10);
        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'maps_link' => 'nullable|url'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/dummy'), $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = 'dummy.jpg';
        }

        Experience::create($data);

        return redirect()->route('admin.manage-post')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'maps_link' => 'nullable|url'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it's not the default
            if ($experience->image !== 'dummy.jpg' && file_exists(public_path('images/dummy/' . $experience->image))) {
                unlink(public_path('images/dummy/' . $experience->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/dummy'), $imageName);
            $data['image'] = $imageName;
        }

        $experience->update($data);

        return redirect()->route('admin.manage-post')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        // Delete image if it's not the default
        if ($experience->image !== 'dummy.jpg' && file_exists(public_path('images/dummy/' . $experience->image))) {
            unlink(public_path('images/dummy/' . $experience->image));
        }

        $experience->delete();

        return redirect()->route('admin.manage-post')->with('success', 'Post deleted successfully!');
    }
}
