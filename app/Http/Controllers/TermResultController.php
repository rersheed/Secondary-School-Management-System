<?php

namespace App\Http\Controllers;

use App\Level;
use App\Promotion;
use App\Result;
use App\Student;
use App\Term;
use App\TermResult;
use App\YearGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TermResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year_group= YearGroup::all();
        $terms= Term::all();
        $levels= Level::all();
        $termResults = TermResult::all();
        $regNumber = Student::pluck('regNumber', 'id');
        $surname = Student::pluck('surname', 'id');
        $othernames = Student::pluck('othernames', 'id');
        return view('termResults.viewResult', compact('year_group', 'terms', 'levels', 'termResults', 'regNumber', 'surname', 'othernames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('termResults.reportCard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sesion = $request->yeargroup;
        $term = $request->term;
        $level = $request->level;

        $students = Promotion::where('year_group_id', $sesion)
                                ->where('level_id', $level)
                                ->select('student_id')
                                ->get();
        $ids = [];
        foreach ($students as $key => $value) {
            $ids[] = $value->student_id; 
        }
        //SELECT student_id, SUM(total) FROM results where student_id in (11,1) GROUP BY student_id  ORDER BY 2 DESC

        $results = Result::select(DB::raw('student_id, SUM(total) as total, count(subject_id) as subject'))
                        ->whereIn('student_id', $ids)
                        ->groupBy('student_id')
                        ->orderBy('total', 'desc')
                        ->get();
                        // dd($results);
        $subjectCount = $results->max('subject');
        $count =1;
        $position = 1;
        $previousTotal=0;
        $termResults = [];
        foreach ($results as $key => $value) {
            $avg = (Double)$value->total;
            $avg = $avg/$subjectCount;

            //(`id`, `total_score`, `position`, `student_id`, `year_group_id`, `term_id`, `created_at`, `updated_at`, `average`)
           $result = TermResult::where('student_id', $value->student_id)
                                ->where('term_id', $term)
                                ->where('year_group_id', $sesion)
                                ->get();

            if (count($result) != 0) {
                continue;
            }

            if ($previousTotal != $value->total) {
                $position = $count;
            }
            $termResults[] = array(
                    'total_score'=> $value->total,
                    'position'=> $position,
                    'student_id'=> $value->student_id,
                    'year_group_id'=> $sesion,
                    'term_id'=> $term,
                    'average'=> $avg
                    );

        // TermResult::insert($termResults);
            $count++;
        }
        // TermResult::insert($termResults);
        $year_group = YearGroup::all();
        $terms = Term::all();
        $levels = Level::all();
        $termResults = TermResult::where('year_group_id', $sesion)
                                ->where('term_id', $term)
                                ->whereIn('student_id', $students)
                                ->get();
        $regNumber = Student::pluck('regNumber', 'id');
        $surname = Student::pluck('surname', 'id');
        $othernames = Student::pluck('othernames', 'id');
        $previousTotal = $value->total;
        return view('termResults.viewResult', compact('year_group', 'terms', 'levels', 'termResults','regNumber', 'surname', 'othernames'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
