<?php

namespace App;

use App\FormTeacher;
use App\SubjectExam;
use App\SubjectTeacher;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name', 'tag'];

    public function subjectExams()
    {
    	return $this->hasMany(SubjectExam::class);
    }

    public function promotions()
    {
    	return $this->hasMany(Promotion::class);
    }

    public function subjectTeachers()
    {
        return $this->hasMany(SubjectTeacher::class);
    }

    public function formTeachers()
    {
        return $this->hasMany(FormTeacher::class);
    }

    public function getLevels()
    {
    	$levels=[];
    	$classes = $this->all();
    	foreach ($classes as $level) {
    		$levels[$level->id] = $level->name . ' - ' . $level->tag;
    	}
    	return $levels;
    }
}
