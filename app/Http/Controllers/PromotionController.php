<?php

namespace App\Http\Controllers;

use App\Level;
use App\Promotion;
use App\Student;
use App\User;
use App\YearGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
	public function getPromotion($level=null, $yeargroup=null)
	{
		$currentYeargroup = new YearGroup;
		$sesions  = YearGroup::pluck('name', 'id');
		$levels = (new Level)->getLevels();
		$users = User::pluck('name', 'id');
		$regNumbers = Student::pluck('regNumber', 'id');
		$students = Student::all();
		$classes = Level::all();
		$yeargroups = YearGroup::orderBy('name', 'desc')->get();
		$promotedStudents=[];
		if ((isset($level) && !empty($level)) && (isset($yeargroup) && !empty($yeargroup))) {
			$yeargroup = str_replace('_', '/', $yeargroup);
			$yeargroup_id = YearGroup::where('name', '=', $yeargroup)->get();
			if ($yeargroup_id != '[]') {
				// return $yeargroup_id;
				$yeargroup_id = $yeargroup_id[0]['id'];
				$promotedStudents = Promotion::where('level_id', '=', $level)
										->where('year_group_id', '=', $yeargroup_id)
										->get();
			}
		}else{
			$promotedStudents = $currentYeargroup->find($currentYeargroup->getCurrentSession())->promotions;
		}
		
		return view('promotions.show', compact('promotedStudents', 'sesions', 'users', 'regNumbers', 'students', 'levels', 'yeargroups', 'classes'));
	}


    public function store(Request $request)
    {
    	///check for the existence of the record
    	$record = Promotion::where('student_id', '=', $request->student_id)
    					->where('year_group_id', '=', $request->year_group_id)
    					->get();
    					// return $record;
    	if (count($record) < 1) {
	    	$promotion = new Promotion;
	    	$promotion->student_id = $request->student_id;
	    	$promotion->year_group_id = $request->year_group_id;
	    	$promotion->level_id = $request->level_id;
	    	$promotion->remark = $request->remark;
	    	$promotion->user_id = Auth::user()->id;
	    	$promotion->save();

	    	return back()->withMessage('Promotion is Successful');
   		}
   		else{
   			return back()->withMessage('Record Found!!! A student can only be promoted once in a session');
   		}
    }

   public function update(Request $request, $id)
    {

    	$promotion = Promotion::findOrFail($id);
    	$promotion->student_id = $request->student_id;
    	$promotion->year_group_id = $request->year_group_id;
    	$promotion->level_id = $request->level_id;
    	$promotion->remark = $request->remark;
    	$promotion->user_id = Auth::user()->id;
    	$promotion->update();
    	return response()->json('done');
    }

    public function bulkPromote(Request $request)
    {
    	$data = [];
    	foreach ($request->student_ids as $id) {
    		$data[] = array(
    			'student_id' => $id,
    			'level_id' => $request->level_id,
    			'year_group_id' => $request->year_group_id,
    			'user_id' => Auth::user()->id
    		);
    	}
    	Promotion::insert($data);
    	return response()->json('done');
    }

    public function show($id)
    {
    	$promotion = Promotion::findOrFail($id);
    	return response()->json($promotion);
    }

}
