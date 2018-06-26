<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.show', compact('teachers'));
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
        $teacher = new Teacher;
        $teacher->surname = $request->surname;
        $teacher->othernames = $request->othernames;
        $teacher->dateOfBirth = $request->dateOfBirth;
        $teacher->placeOfBirth = $request->placeOfBirth;
        $teacher->sex = $request->sex;
        $teacher->phone = $request->phone;
        $teacher->stateOfOrigin = $request->stateOfOrigin;
        $teacher->lga = $request->lga;
        $teacher->address = $request->address;
        $teacher->dateOfHiring = $request->dateOfHiring;
        $teacher->specialty = $request->specialty;
        $teacher->salary = $request->salary;
        $teacher->save();

        return back()->withMessage('Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.single', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return response()->json($teacher);
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
        //'surname','othernames','dateOfBirth','placeOfBirth','sex','phone','stateOfOrigin','lga','address','dateOfHiring','specialty','salary'
        $teacher = Teacher::findOrFail($id);
        $teacher->surname = $request->surname;
        $teacher->othernames = $request->othernames;
        $teacher->dateOfBirth = $request->dateOfBirth;
        $teacher->placeOfBirth = $request->placeOfBirth;
        $teacher->sex = $request->sex;
        $teacher->phone = $request->phone;
        $teacher->stateOfOrigin = $request->stateOfOrigin;
        $teacher->lga = $request->lga;
        $teacher->address = $request->address;
        $teacher->dateOfHiring = $request->dateOfHiring;
        $teacher->specialty = $request->specialty;
        $teacher->salary = $request->salary;
        $teacher->update();

        return response()->json('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return response()->json('Deleted Successfully');
    }
}
