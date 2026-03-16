<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $page = 1)
    {
        $teachers = User::role("teacher")->paginate(5);
        $campos = [
            "name"=> "Nombre",
            "phone"=> "Teléfono",
            "email"=> "Correo",
            "department"=> "Departamento",
        ];

        return view('teachers.index', compact('teachers', 'campos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $page = request()->get('page');

        return view('teachers.edit', compact('teacher','page'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $page = request()->get('page');
        $datos = request()->input();
        $teacher->update($datos);
        return redirect()->route('teachers.index',['page' => $page]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $page = request()->get("page");
        $teacher->delete();
        return redirect()->route('teachers.index',['page'=>$page]);
        //
    }
}
