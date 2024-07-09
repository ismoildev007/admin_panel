<?php


namespace App\Http\Controllers;

use App\Models\CompanyHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyHistories = CompanyHistory::latest()->paginate(10);
        return view('admin.companyHistory.index',compact('companyHistories'))->with('company_histories', $companyHistories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companyHistory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'text_uz' => 'required|string',
            'text_ru' => 'required|string',
            'text_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'nullable|string',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('post_photo');
        }

        CompanyHistory::create($data);

        return redirect()->route('company_history.index')->with('success', 'CompanyHistory created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(CompanyHistory $companyHistory)
    {
        return view('admin.companyHistory.show')->with('company_history', $companyHistory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyHistory $companyHistory)
    {
        return view('admin.companyHistory.edit')->with('company_history', $companyHistory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyHistory $companyHistory)
    {
        $validated = $request->validate([
            'text_uz' => 'required|string',
            'text_ru' => 'required|string',
            'text_en' => 'required|string',
            'date' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            if ($companyHistory->image) {
                Storage::delete($companyHistory->image);
            }
            $data['image'] = $request->file('image')->store('post_photo');
        }

        $companyHistory->update($data);

        return redirect()->route('company_history.index')->with('success', 'CompanyHistory updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyHistory $companyHistory)
    {

        $companyHistory->delete();

        return redirect()->route('company_history.index')->with('success', 'CompanyHistory deleted successfully.');
    }
}
