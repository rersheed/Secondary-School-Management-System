<?php

namespace App\Http\Controllers;

use App\FeeType;
use App\Level;
use App\Promotion;
use App\Student;
use App\StudentFee;
use App\Term;
use App\TuitionFee;
use App\YearGroup;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function allStudent($level=null)
    {
        $levels = (new Level)->getLevels();
        if (isset($level) && !empty($level)) {
        	$student_ids = Promotion::where('level_id', '=', $level)
        						->where('year_group_id', '=', (new YearGroup)->getCurrentSession())
        						->get();
	       	$students = [];
	        foreach ($student_ids as $id) {
	        	$students[] = Student::find($id->student_id);
	        }
        }else{
			$students=Student::orderBy('regNumber','asc')->get();
        }
    	$pdf = PDF::loadView('pdf.allStudent', compact('students', 'levels', 'level'));
    	return $pdf->stream('AllStduents.pdf');
    	// return view('pdf.allStudent', compact('students', 'levels'));
    }

    public function classStudents($level_id, $sesion_id)
    {
        $levels = (new Level)->getLevels();
        $sesions = YearGroup::pluck('name', 'id');
        $student_ids = Promotion::where('level_id', '=', $level_id)
                                ->where('year_group_id', '=', $sesion_id)
                                ->get();
        $students = [];
        foreach ($student_ids as $id) {
            $students[] = Student::find($id->student_id);
        }
        $pdf = PDF::loadView('pdf.classStudents', compact('level_id', 'sesion_id', 'levels', 'sesions', 'students'));
        return $pdf->stream('scoresheet.pdf');
    	// return view('pdf.classStudents', compact('level_id', 'sesion_id', 'levels', 'sesions', 'students'));
    }

    public function paymentDetails(Request $request)
    {
        $tuitionfee = TuitionFee::where('fee_type_id', $request->feetype)
                                ->where('year_group_id', $request->yeargroup)
                                ->where('term_id', $request->term)
                                ->get();
        $students = Promotion::where('level_id', $request->level)
                            ->where('year_group_id', $request->yeargroup)
                            ->select('student_id')
                            ->get();
        $studentids = [];
        foreach ($students as $key => $value) {
            $studentids[] = $value->student_id;
        }

        $payments = StudentFee::where('tuition_fee_id', $tuitionfee[0]->id)
                                ->whereIn('student_id', $studentids)
                                ->get();

        $level = Level::find($request->level)->name;
        // strtoupper($level);
        $sesion = YearGroup::find($request->yeargroup)->name;
        $term = Term::find($request->term)->name;
        $feetype = FeeType::find($request->feetype)->name;
        $regNumbers = Student::pluck('regNumber', 'id');
        $surnames = Student::pluck('surname', 'id');
        $othernames = Student::pluck('othernames', 'id');
        $pdf = PDF::loadView('pdf.feesPayments', compact('level', 'sesion', 'term', 'feetype', 'payments', 'regNumbers', 'surnames', 'othernames'));
        return $pdf->stream('PaymentDetails.pdf');
        // return view('pdf.feesPayments', compact('level', 'sesion', 'term', 'feetype', 'payments', 'regNumbers', 'surnames', 'othernames'));

    }
}
