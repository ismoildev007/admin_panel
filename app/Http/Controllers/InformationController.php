<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information = Information::latest()->paginate(10);
        return view('admin.information.index')->with('information', $information);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.information.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('post_photo');
        }

        Information::create($data);

        return redirect()->route('information.index')->with('success', 'Information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        return view('admin.information.show')->with('information', $information);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        $categories = Category::all(); // Need to pass categories to the view
        return view('admin.information.edit', compact('information', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            if ($information->image) {
                Storage::delete($information->image);
            }
            $data['image'] = $request->file('image')->store('post_photo');
        }

        $information->update($data);

        return redirect()->route('information.index')->with('success', 'Information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        if ($information->image) {
            Storage::delete($information->image);
        }

        $information->delete();

        return redirect()->route('information.index')->with('success', 'Partner deleted successfully.');
    }
}
