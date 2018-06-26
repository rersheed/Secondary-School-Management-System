<?php

namespace App;

use App\Student;
use App\SubjectExam;
use Illuminate\Database\Eloquent\Model;

class ExamParticipation extends Model
{
    protected $fillable = ['subject_exam_id','student_id','exam_score','remark'];

    public function subjectExam()
    {
    	return $this->belongsTo(SubjectExam::class);
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

   	public function subjectScores()
   	{
   		return $this->hasMany(SubjectScore::class);
   	}

    
}
