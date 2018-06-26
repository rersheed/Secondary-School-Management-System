<?php

namespace App\Http\Controllers;

use App\Term;
use App\YearGroup;
use Illuminate\Http\Request;

class YearGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yeargroups = YearGroup::all();
        $terms = Term::all();
        $sesions = YearGroup::pluck('name', 'id');
        return view('sessionsTerms.show', compact('yeargroups', 'terms', 'sesions'));
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
        YearGroup::create($request->all());
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
        $yeargroup = YearGroup::findOrFail($id);
        return $yeargroup;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yeargroup = YearGroup::findOrFail($id);
        return response()->json($yeargroup);
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
        // return $request->all();
        $yeargroup = YearGroup::findOrFail($id);
        $yeargroup->update($request->all());
        return response()->json($yeargroup);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yeargroup = YearGroup::findOrFail($id);
        $yeargroup->delete();
        return response()->json();
    }
}
