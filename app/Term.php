<?php

namespace App;

use App\Exam;
use App\SubjectScore;
use App\TermResult;
use App\Test;
use App\TuitionFee;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = ['name','start_date','end_date','year_group_id'];

    public function yearGroup()
    {
    	return $this->belongsTO(YearGroup::class);
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
}
