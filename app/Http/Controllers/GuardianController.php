<?php

namespace App\Http\Controllers;

use App\Guardian;
use App\Level;
use App\YearGroup;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guardians = Guardian::all();
        return view('guardians.show', compact('guardians'));
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
        //'surname','othernames','phone','email','countryOfOrigin','stateOfOrigin','lga','address'
        // return $request->all();
        // $this->validate([
        //     'surname'=>'required|max:30',
        //     'othernames'=>'required|max:30',
        //     'phone'=>'required|unique:guardians',
        //     'email'=>'required|max:50',
        //     'countryOfOrigin'=>'required|max:50',
        //     'stateOfOrigin'=>'required|max:50',
        //     'lga'=>'required|max:50',
        //     'address'=>'required'
        // ]);

        Guardian::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guardian = Guardian::findOrFail($id);
        $students = (new Guardian)->find($id)->students;
        $sesion = new YearGroup;
        $current = $sesion->find($sesion->getCurrentSession())->promotions;
        $currentClasses=[];
        $levels = (new Level)->getLevels();
        $levels[0] = "";
        foreach ($students as $student) {
            $promotion =$current->pluck('level_id','student_id');
            $level_id = (isset($promotion[$student->id]) ? $promotion[$student->id]: 0);
            $currentClasses[$student->id] =$levels[$level_id];
        }
        return view('guardians.single', compact('students', 'guardian', 'currentClasses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guardian = Guardian::findOrFail($id);
        return response()->json($guardian);
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
        $guardian = Guardian::findOrFail($id);
        $guardian->update($request->all());
        return response()->json($guardian);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();
        return response()->json($guardian);
    }
}
