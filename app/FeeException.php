<?php

namespace App;

use App\Student;
use App\User;
use Illuminate\Database\Eloquent\Model;

class FeeException extends Model
{
    protected $fillable = ['student_id','user_id','reason'];

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function createdBy()
    {
    	return $this->belongsTo(User::class);
    }
}
