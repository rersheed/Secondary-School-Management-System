<?php

namespace App;

use App\SubjectExam;
use App\Term;
use App\User;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['start_date','end_date','description','year_group_id','term_id','user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function yearGroup()
    {
    	return $this->belongsTo(YearGroup::class);
    }

    public function term()
    {
    	return $this->belongsTo(Term::class);
    }

    public function subjectExams()
    {
        return $this->hasMany(SubjectExam::class);
    }
}
