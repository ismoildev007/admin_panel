<?php


namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'text_uz' => 'required|string|max:255',
            'text_ru' => 'required|string|max:255',
            'text_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
            'date' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . "_" . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('news_photo',$imageName);
            $validated['image'] = $path;
        }

        $data = $validated;

        News::create($data);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'text_uz' => 'required|string|max:255',
            'text_ru' => 'required|string|max:255',
            'text_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
            'date' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($news->image);
            $imageName = time() . "_" . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs("news_photo" , $imageName);
            $validated['image'] = $path;
        }
        $data = $validated;

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
