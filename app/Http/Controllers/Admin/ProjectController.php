<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.list', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'client' => 'required',
        //     'description' => 'required',
        // ]);

        Project::create($request->all());

        return redirect()->route('admin.projects.list')->with('success', 'Proje başarıyla oluşturuldu.');
    }

    public function edit(int $id)
    {
        $project=Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, int $id)
    {
        // $request->validate([
        //     'client' => 'required',
        //     'description' => 'required',
        // ]);
        $project = Project::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('admin.projects.list')->with('success', 'Proje başarıyla güncellendi.');
    }

    public function destroy(int $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.list')->with('success', 'Proje başarıyla silindi.');
    }
}
