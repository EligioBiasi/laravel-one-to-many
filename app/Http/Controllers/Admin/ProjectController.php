<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(15);
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img_path = Storage::put('uploads', $request['image']);
        $data['image'] = $img_path;

        $data = $request->validate([
            'title' => ['required','min:3', 'max:255'],
            'image' => ['file'],
            'description' => ['required', 'min:10'],
        ]);

        $data['slug'] = Str::of($data['title'])->slug('-');
        $newProject = Project::create($data);

        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => ['required','min:3', 'max:255'],
            'image' => ['url:https'],
            'description' => ['required', 'min:10'],
        ]);

        $data['slug'] = Str::of($data['title'])->slug('-');
        $project->update($data);
        return redirect()->route('admin.project.show', compact('project'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index');
    }

    public function deletedindex(){
        $project= Project::onlyTrashed()->paginate(10);
        return view('admin.project.deleted', compact('project'));
    }

    public function restore($id){
        $project= Project::withTrashed()->findOrFail($id);
        $project->restore();
        
        return redirect()->route('admin.project.show', $project);
    }
}
