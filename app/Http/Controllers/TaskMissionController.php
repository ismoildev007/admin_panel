<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreMissionRequest;
use App\Models\TaskMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class TaskMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskMissions = TaskMission::latest()->paginate(10);
        return view('admin.mission.index')->with('taskMissions', $taskMissions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMissionRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('post_photo');
        }
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf')->store('post_pdf');
        }
        $validated['pdf'] = $pdf ?? null;
        $validated['image'] = $path ?? null;
        TaskMission::create($validated);

        return redirect()->route('mission.index')->with('success', 'TaskMission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskMission $mission)
    {
        return view('admin.mission.show')->with('mission', $mission);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskMission $mission)
    {
        return view('admin.mission.edit')->with('mission', $mission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mission)
    {
        $taskMission = TaskMission::find($mission);
        
        $validated = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:5056',
        ]);



        if ($request->hasFile('image')) {
            if ($taskMission->image) {
                Storage::delete($taskMission->image);
            }
            $validated['image'] = $request->file('image')->store('post_photo') ?? $taskMission->image;
        }

        if ($request->hasFile('pdf')) {
            if ($taskMission->pdf) {
                Storage::delete($taskMission->pdf);
            }
            $validated['pdf'] = $request->file('pdf')->store('post_pdf') ?? $taskMission->pdf;
        }
        $validated['image'] = $taskMission->image;
        $validated['pdf'] = $taskMission->pdf;

        $taskMission->update($validated);

        return redirect()->route('mission.index')->with('success', 'TaskMission updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskMission $taskMission)
    {
        if ($taskMission->image) {
            Storage::delete($taskMission->image);
        }
        if ($taskMission->pdf) {
            Storage::delete($taskMission->pdf);
        }

        $taskMission->delete();

        return redirect()->route('mission.index')->with('success', 'TaskMission deleted successfully.');
    }
}
