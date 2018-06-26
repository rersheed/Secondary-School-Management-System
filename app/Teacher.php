<?php

namespace App;

use App\FormTeacher;
use App\Subject;
use App\SubjectTeacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = ['surname','othernames','dateOfBirth','placeOfBirth','sex','phone','stateOfOrigin','lga','address','dateOfHiring','specialty','salary'];

    public function subjectTeachers()
    {
    	return $this->hasMany(SubjectTeacher::class);
    }

    public function formTeachers()
    {
    	return $this->hasMany(FormTeacher::class);
    }
}
