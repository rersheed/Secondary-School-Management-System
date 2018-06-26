<?php

namespace App;

use App\Student;
use App\Subject;
use App\Term;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['student_id','subject_id','year_group_id','term_id','test1','test2','exam','total','grade'];

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function subject()
    {
    	return $this->belongsTo(Subject::class);
    }

    public function yearGroup()
    {
    	return $this->belongsTo(YearGroup::class);
    }

    public function term()
    {
    	return $this->belongsTo(Term::class);
    }

    public function getGrade($value)
    {
    	if ($value < 40) {
    		return 'F';
    	}else if ($value < 45 && $value >= 40) {
    		return 'E';
    	}else if($value < 50 && $value >= 45){
    		return 'D';
    	}else if($value < 60 && $value >= 50){
    		return 'C';
    	}else if($value < 70 && $value >= 60){
    		return 'B';
    	}else if($value < 100 && $value >= 70){
    		return 'A';
    	}else{
    		return null;
    	}
    }
}
