<?php

namespace App;

use App\Student;
use App\Term;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class TermResult extends Model
{
    protected $fillable = ['total_score','position','student_id','year_group_id','term_id'];

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function yearGroup()
    {
    	return $this->belongsTo(YearGroup::class);
    }

    public function term()
    {
    	return $this->belongsTo(Term::class);
    }

    public function getPositionAttribute($value)
    {
        $length = strlen($value);
        $lastChar = substr($value, $length - 1, 1);
        if ($lastChar == 1) {
            return $value . "st";
        }else if ($lastChar == 2) {
            return $value . "nd";
        }else if ($lastChar == 3) {
            return $value . "rd";
        }else{
            return $value . "th";
        }
    }
}
