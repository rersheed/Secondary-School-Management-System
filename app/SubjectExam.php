<?php

namespace App;

use App\Exam;
use App\ExamParticipation;
use App\Level;
use App\Subject;
use Illuminate\Database\Eloquent\Model;

class SubjectExam extends Model
{
    protected $fillable = ['exam_date','start_time','duration','exam_id','subject_id','level_id'];

    public function exam()
    {
    	return $this->belongsTo(Exam::class);
    }

    public function subject()
    {
    	return $this->belongsTo(Subject::class);
    }

    public function level()
    {
    	return $this->belongsTo(Level::class);
    }

    public function examParticipations()
    {
        return $this->hasMany(ExamParticipation::class);
    }
}
