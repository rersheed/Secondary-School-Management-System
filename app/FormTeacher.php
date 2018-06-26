<?php

namespace App;

use App\Level;
use App\Teacher;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class FormTeacher extends Model
{
    protected $fillable = ['teacher_id','level_id','year_group_id'];

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class);
    }

    public function level()
    {
    	return $this->belongsTo(Level::class);
    }

    public function yearGroup()
    {
    	return $this->belongsTo(YearGroup::class);
    }
}
