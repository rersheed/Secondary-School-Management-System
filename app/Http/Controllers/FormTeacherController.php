<?php

namespace App\Http\Controllers;

use App\FormTeacher;
use App\Level;
use App\Teacher;
use App\YearGroup;
use Illuminate\Http\Request;

class FormTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formTeachers = FormTeacher::all();
        $classes = Level::all();
        $levels = (new Level)->getLevels();
        $yeargroups = YearGroup::all();
        $sesions = YearGroup::pluck('name', 'id');
        $instructors = Teacher::all();
        $othernames = Teacher::pluck('othernames', 'id');
        $surnames = Teacher::pluck('surname', 'id');
        $courses = [];
        $termx = [];
        return view('teachers.classAllocations', compact('formTeachers', 'levels', 'classes', 'yeargroups', 'sesions', 'instructors', 'surnames', 'othernames', 'courses', 'termx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FormTeacher::create($request->all());
        return back()->withMessage('Record Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formTeacher = FormTeacher::findOrFail($id);
        return response()->json($formTeacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formTeacher = FormTeacher::findOrFail($id);
        return response()->json($formTeacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formTeacher = FormTeacher::findOrFail($id);
        $formTeacher->teacher_id = $request->teacher_id;
        $formTeacher->level_id = $request->level_id;
        $formTeacher->year_group_id = $request->year_group_id;
        $formTeacher->update();

        return response()->json($formTeacher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formTeacher = FormTeacher::findOrFail($id);
        $formTeacher->delete();
        return response()->json('Record Deleted Successfully');
    }
}
