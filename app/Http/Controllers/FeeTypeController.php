<?php

namespace App\Http\Controllers;

use App\FeeType;
use App\Term;
use App\TuitionFee;
use App\YearGroup;
use Illuminate\Http\Request;

class FeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = TuitionFee::all();
        $feetypes = FeeType::all();
        $yeargroups = YearGroup::all();
        $terms = Term::all();

        $feestype = FeeType::pluck('name', 'id');
        $sesions = YearGroup::pluck('name', 'id');
        $termx = Term::pluck('name', 'id');
        return view('fees.setFees', compact('fees', 'feetypes', 'yeargroups', 'terms', 'feestype', 'sesions','termx'));
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
        FeeType::create($request->all());
        return back()->withMessage('Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FeeType  $feeType
     * @return \Illuminate\Http\Response
     */
    public function show($feeType)
    {
        $feetype = FeeType::findOrFail($feeType);
        return response()->json($feetype);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FeeType  $feeType
     * @return \Illuminate\Http\Response
     */
    public function edit($feeType)
    {
        // return $feeType;
        $feetype = FeeType::findOrFail($feeType);
        return response()->json($feetype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FeeType  $feeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $feeType)
    {
        $feetype = FeeType::findOrFail($feeType);
        $feetype->name = $request->name;
        $feetype->description = $request->description;
        $feetype->update();


        return response()->json($feetype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FeeType  $feeType
     * @return \Illuminate\Http\Response
     */
    public function destroy($feeType)
    {
        $feetype = FeeType::findOrFail($feeType);
        $feetype->delete();

        return response()->json($feetype);
    }
}
