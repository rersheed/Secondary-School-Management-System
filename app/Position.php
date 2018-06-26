<?php

namespace App;

use App\Student;
use App\Term;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['student_id','year_group_id','term_id'];

    public function students()
    {
    	return $this->belongsTo(Student::class);
    }

    public function yearGroup()
    {
    	return $this->belongsTo(YearGroup::class);
    }

    public function term()
    {
    	return $this->belongsTo(Term::class);
    }
}
