<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'status' => 'required|string|max:100',
            'responsible' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('projects.create')
                ->withErrors($validator)
                ->withInput();
        }

        Project::create($request->all());
        return redirect()->route('projects.index')
            ->with('success', 'Proyecto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'status' => 'required|string|max:100',
            'responsible' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('projects.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $project = Project::findOrFail($id);
        $project->update($request->all());
        
        return redirect()->route('projects.index')
            ->with('success', 'Proyecto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto eliminado exitosamente');
    }
}
