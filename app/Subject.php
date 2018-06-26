<?php

namespace App;

use App\SubjectExam;
use App\SubjectTeacher;
use App\Teacher;
use App\Test;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'code', 'description'];

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class);
    }

    public function subjectExams()
    {
    	return $this->hasMany(SubjectExam::class);
    }

    public function tests()
    {
    	return $this->hasMany(Test::class);
    }

    public function subjectTeachers()
    {
        return $this->hasMany(SubjectTeacher::class);
    }
}
