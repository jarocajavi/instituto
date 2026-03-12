<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the all projects
     */
    public function index()
    {
        //Obtener todos los proyectos
        $projects = Project::paginate(5);
        $campos =
            [
            "name" => "Nombre",
            "description" => "Descripción",
            "start_date" => "Fecha de inicio",
            "hours" => "Horas"];

        //Devolver un html  donde los  muestre, retornaré la vista y le paso los proyectos
//        return view('projects.index',['projects'=>$projects]);
        return view('projects.index', compact('projects', 'campos'));


        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $datos = $request->input();
        Project::create($datos);
        return redirect()->route('projects.index');


        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $datos = $request->input();
        $project->update($datos);
        return redirect()->route('projects.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');


        //
    }
}
