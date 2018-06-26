<?php

namespace App;

use App\ExamParticipation;
use App\FeeException;
use App\Guardian;
use App\Level;
use App\Position;
use App\Promotion;
use App\StudentFee;
use App\SubjectScore;
use App\TermResult;
use App\Test;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ['regNumber','surname','othernames','sex','dateOfBirth','phone','lastSchool','admissionDate','level_id','address','is_active','guardian_id',"image"];

    public function guardian()
    {
    	return $this->belongsTo(Guardian::class);
    }

    public function admissionClass()
    {
    	return $this->belongsTo(Level::class);
    }

    public function examParticipations()
    {
        return $this->hasMany(ExamParticipation::class);
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

    public function studentFees()
    {
        return $this->hasMany(StudentFee::class);
    }

    public function feeExceptions()
    {
        return $this->hasMany(FeeException::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
