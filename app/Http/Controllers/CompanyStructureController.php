<?php


namespace App\Http\Controllers;

use App\Models\CompanyStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyStructures = CompanyStructure::latest()->paginate(10);
        return view('admin.companyStructure.index',compact('companyStructures'))->with('companyStructure', $companyStructures);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companyStructure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_uz' => 'required|string|max:191',
            'title_ru' => 'required|string|max:191',
            'title_en' => 'required|string|max:191',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('post_photo');
        }

        CompanyStructure::create($data);

        return redirect()->route('company_structure.index')->with('success', 'CompanyStructure created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyStructure $companyStructure)
    {
        return view('admin.companyStructure.show')->with('companyStructure', $companyStructure);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyStructure $companyStructure)
    {
        return view('admin.companyStructure.edit')->with('companyStructure', $companyStructure);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyStructure $companyStructure)
    {
        $validated = $request->validate([
            'title_uz' => 'required|string|max:191',
            'title_ru' => 'required|string|max:191',
            'title_en' => 'required|string|max:191',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            if ($companyStructure->image) {
                Storage::delete($companyStructure->image);
            }
            $data['image'] = $request->file('image')->store('post_photo');
        }

        $companyStructure->update($data);

        return redirect()->route('company_structure.index')->with('success', 'CompanyStructure updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyStructure $companyStructure)
    {

        $companyStructure->delete();

        return redirect()->route('company_structure.index')->with('success', 'CompanyStructure deleted successfully.');
    }
}
