<?php

namespace App\Http\Controllers;

use App\TuitionFee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // return $request->all();
        TuitionFee::create($request->all());
        return back()->withMessage('saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fee = TuitionFee::findOrFail($id);
        return response()->json($fee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fee = TuitionFee::findOrFail($id);
        return response()->json($fee);
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
        $fee = TuitionFee::findOrFail($id);
        $fee->fee_type_id = $request->fee_type_id;
        $fee->amount = $request->amount;
        $fee->start_date = $request->start_date;
        $fee->end_date = $request->end_date;
        $fee->year_group_id = $request->year_group_id;
        $fee->term_id = $request->term_id;
        $fee->update();
        return response()->json($fee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee = TuitionFee::findOrFail($id);
        $fee->delete();
        return response()->json($fee);
    }
}
