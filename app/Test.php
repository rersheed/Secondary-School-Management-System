<?php

namespace App;

use App\Student;
use App\Subject;
use App\Term;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['date','score','remark','student_id','subject_id','year_group_id','term_id'];

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
}
