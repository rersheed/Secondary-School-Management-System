<?php

namespace App;

use App\ExamParticipation;
use App\Student;
use App\Term;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class SubjectScore extends Model
{
    protected $fillable = ['student_id','year_group_id','term_id','exam_participationr_id','test_score','total_score','grade'];

    public function examParticipation()
    {
    	return $this->belongsTo(ExamParticipation::class);
    }

    public function term()
    {
    	return $this->belongsTo(Term::class);
    }

    public function yearGroup()
    {
    	return $this->belongsTo(YearGroup::class);
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    
}
