<?php

namespace App;

use App\Level;
use App\Student;
use App\User;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['student_id','year_group_id','level_id', 'user_id', 'remark'];

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function yearGroup()
    {
    	return $this->belongsTo(YearGroup::class);
    }

    public function level()
    {
    	return $this->belongsTo(Level::class);
    }

    public function createdBy()
    {
    	return $this->belongsTo(User::class);
    }
}
