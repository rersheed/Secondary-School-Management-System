<?php

namespace App\Http\Controllers;

use App\Level;
use App\Subject;
use App\SubjectTeacher;
use App\Teacher;
use App\Term;
use App\YearGroup;
use Illuminate\Http\Request;

class SubjectTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjectTeachers = SubjectTeacher::all();
        $sesions = YearGroup::pluck('name', 'id');
        $levels = (new Level)->getLevels();
        $teachers = Teacher::pluck('surname', 'id');
        $instructors = Teacher::all();
        $yeargroups = YearGroup::all();
        $classes = Level::all();
        $subjects = Subject::pluck('code', 'id');
        $courses = Subject::all();
        $termx = Term::all();
        $terms = Term::pluck('name', 'id');
        return view('teachers.subjectAllocations', compact('subjectTeachers', 'instructors', 'sesions', 'yeargroups', 'levels','classes', 'teachers', 'subjects', 'courses', 'terms', 'termx'));
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
        //'teacher_id','subject_id','level_id','year_group_id','term_id'

        SubjectTeacher::create($request->all());
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
        $subjectTeacher = SubjectTeacher::findOrFail($id);
        return response()->json($subjectTeacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjectTeacher = SubjectTeacher::findOrFail($id);
        return response()->json($subjectTeacher);
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
        //'teacher_id','subject_id','level_id','year_group_id','term_id'
        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $subjectTeacher->teacher_id = $request->teacher_id;
        $subjectTeacher->subject_id = $request->subject_id;
        $subjectTeacher->level_id = $request->level_id;
        $subjectTeacher->year_group_id = $request->year_group_id;
        $subjectTeacher->term_id = $request->term_id;
        $subjectTeacher->update();

        return response()->json('Record Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $subjectTeacher->delete();
        return response()->json('Record deleted Successfully');
    }
}
