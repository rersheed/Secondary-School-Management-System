<?php

namespace App;

use App\Level;
use App\Subject;
use App\Teacher;
use App\Term;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    protected $fillable = ['teacher_id','subject_id','level_id','year_group_id','term_id'];

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
    	return $this->belongsTo(Subject::class);
    }

    public function level()
    {
    	return $this->belongsTo(Level::class);
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
