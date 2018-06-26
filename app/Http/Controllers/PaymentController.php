<?php

namespace App\Http\Controllers;

use App\FeeType;
use App\Level;
use App\Student;
use App\StudentFee;
use App\Term;
use App\TuitionFee;
use App\YearGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuitionfees = TuitionFee::all();
        $students = Student::all();
        $payments = (new StudentFee)->getSessionPayments();
        $feetypes = FeeType::pluck('name', 'id');
        $sesions = YearGroup::pluck('name', 'id');
        $terms = Term::pluck('name', 'id');
        return view('fees.studentfee', compact('students', 'tuitionfees', 'payments', 'feetypes', 'sesions', 'terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $feetypes = FeeType::all();
       $sesions = YearGroup::all();
       $terms = Term::all();
       $levels = Level::all();
       return view('fees.payments', compact('feetypes', 'sesions', 'terms', 'levels'));
        // return view('fees.payments', compact('students', 'tuitionfees', 'payments', 'feetypes', 'sesions', 'terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentfee = new StudentFee;
        $student = StudentFee::where('student_id', '=', $request->student_id)
                    ->where('tuition_fee_id', '=', $request->tuition_fee_id)->get();
        if ($student != '[]') {
            return back()->withMessage('Student has already paid school fees..');
        }
        $studentfee->tuition_fee_id = $request->tuition_fee_id;
        $studentfee->student_id = $request->student_id;
        $studentfee->amount = $request->amount;
        $studentfee->user_id = Auth::user()->id;
        $studentfee->save();
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
        $studentfee = StudentFee::findOrFail($id);
        return response()->json($studentfee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $studentfee = StudentFee::findOrFail($id);
        return response()->json($studentfee);
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
        //'tuition_fee_id','student_id','user_id','amount','date'
        $studentfee = StudentFee::findOrFail($id);
        $studentfee->tuition_fee_id = $request->tuition_fee_id;
        $studentfee->student_id = $request->student_id;
        $studentfee->amount = $request->amount;
        $studentfee->user_id = Auth::user()->id;
        $studentfee->update();

        return response()->json($studentfee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentfee = StudentFee::findOrFail($id);
        $studentfee->delete();
        return response()->json($studentfee);
    }
}
