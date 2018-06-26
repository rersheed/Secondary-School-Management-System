<?php

namespace App;

use App\Exam;
use App\FormTeacher;
use App\Position;
use App\Promotion;
use App\SubjectScore;
use App\SubjectTeacher;
use App\Term;
use App\TermResult;
use App\Test;
use App\TuitionFee;
use Illuminate\Database\Eloquent\Model;

class YearGroup extends Model
{
    
	protected $fillable = ['name', 'start_date', 'end_date'];

    public function getCurrentSession()
    {
        $sessions = $this->all();
        return ($sessions->last() == null) ? null: $sessions->last()->id;
    }
    public function term()
    {
    	return $this->hasMany(Term::class);
    }

    public function formTeachers()
    {       
        return $this->hasMany(FormTeacher::class);
    }

    public function exams()
    {
    	return $this->hasMany(Exam::class);
    }

    public function subjectScores()
    {
    	return $this->hasMany(SubjectScore::class);
    }

    public function termResults()
    {
        return $this->hasMany(TermResult::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function tuitionFees()
    {
        return $this->hasMany(TuitionFee::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function subjectTeachers()
    {
        return $this->hasMany(SubjectTeacher::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
