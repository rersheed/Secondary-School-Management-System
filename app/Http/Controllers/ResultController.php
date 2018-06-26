<?php

namespace App\Http\Controllers;

use App\Level;
use App\Result;
use App\Student;
use App\Subject;
use App\Term;
use App\YearGroup;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year_group = YearGroup::all();
        $term = Term::all();
        $level = Level::all();
        $subject = Subject::all();
        return view('results.upload', compact('year_group', 'term', 'level', 'subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $scoresheets = Result::distinct()->select('subject_id', 'year_group_id', 'term_id')->get();
        // return $scoresheets;
        $year_group = YearGroup::all();
        $terms = Term::all();
        $subjects = Subject::all();
        $session = YearGroup::pluck('name', 'id');
        $termName = Term::pluck('name', 'id');
        $subjectName = Subject::pluck('name', 'id');
        $regNumber = Student::pluck('regNumber', 'id');
        $surname = Student::pluck('surname', 'id');
        $othernames = Student::pluck('othernames', 'id');
        $year_group_id = 1;
        $term_id = 1;
        $subject_id = 1; 
        $scoresheet = Result::all();

        // return $sesion;
        return view('results.viewUploaded', compact('year_group', 'terms', 'subjects', 'session', 'termName', 'subjectName', 'scoresheet', 'othernames', 'surname', 'regNumber', 'year_group_id', 'term_id', 'subject_id'));
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
        //get file
        $upload = $request->file('scoresheet');
        $filePath = $upload->getRealPath();

        //open and read
        $file = fopen($filePath, 'r');
        $header = fgetcsv($file);

        // dd($header);

        $escapedHeader = [];
        //validate
        foreach ($header as $key => $value) {
            $lheader = $value;
            $escapedItem = preg_replace('/[^a-z]_/', '', $lheader);
            // $escapedItem = $lheader;
            array_push($escapedHeader, $escapedItem);
        }

            // dd($escapedHeader);

        //looping through other cclumns
        while ($columns = fgetcsv($file)) {
            if ($columns[0] == "") {

                continue;
            }
            //trim data
            foreach ($columns as $key => &$value) {
                // $value = preg_replace('/\D/', '', $value);
                $value=$value;
            }

            $data = array_combine($escapedHeader, $columns);

            //setting type
            foreach ($data as $key => &$value) {
                $value = ($key == "regNumber") ? (String)$value : (Integer)$value;
            }

            $students = Student::pluck('id', 'regNumber');
            //Table update
            $regNumber="";
            $errors = 0;
            if (isset($students[$data['regNumber']])) {
                $regNumber = $students[$data['regNumber']];
            }else{
                $errors++;
                continue;
            }
            $student_id = $regNumber;
            $subject_id = $request->subject;
            $year_group_id = $request->year_group;
            $term_id = $request->term;
            $test1 = $data['test1'];
            $test2 = $data['test2'];
            $exam = $data['exam'];
            $total = $test1 + $test2 + $exam;
            $grade = (new Result)->getGrade($total);

            $result = Result::firstOrNew(['student_id' => $student_id,'subject_id' => $subject_id,'year_group_id' => $year_group_id,'term_id' => $term_id]);
            
            $result->student_id = $student_id;
            $result->subject_id = $subject_id;
            $result->year_group_id = $year_group_id;
            $result->term_id = $term_id;
            $result->test1 = $test1;
            $result->test2 = $test2;
            $result->exam = $exam;
            $result->total = $total;
            $result->grade = $grade;

            $result->save();

        }
        return back()->withMessage('Scores imported successfully ('.$errors.' not imported)');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show($year_group_id, $term_id, $subject_id)
    {
        $scoresheet = Result::where('year_group_id', $year_group_id)
                            ->where('term_id', $term_id)
                            ->where('subject_id', $subject_id)
                            ->get();
        $year_group = YearGroup::all();
        $terms = Term::all();
        $subjects = Subject::all();
        $session = YearGroup::pluck('name', 'id');
        $termName = Term::pluck('name', 'id');
        $subjectName = Subject::pluck('name', 'id');
        $regNumber = Student::pluck('regNumber', 'id');
        $surname = Student::pluck('surname', 'id');
        $othernames = Student::pluck('othernames', 'id');
        // return $sesion;
        return view('results.viewUploaded', compact('year_group', 'terms', 'subjects', 'session', 'termName', 'subjectName', 'scoresheet', 'othernames', 'surname', 'regNumber', 'year_group_id', 'term_id', 'subject_id'));
        // return response()->json($scoresheet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        $regNumber = Student::pluck('regNumber', 'id');
        return response()->json([$result, $regNumber]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $result->test1 = $request->test1;
        $result->test2 = $request->test2;
        $result->exam = $request->exam;
        $total = $result->test1 + $result->test2 + $result->exam;
        $grade = (new Result)->getGrade($total);
        $result->total = $total;
        $result->grade = $grade;
        $result->update();
        return response()->json("Done");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }

    public function getResult()
    {
        return view('results.viewResult');
    }
}
