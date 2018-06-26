<?php

namespace App;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
	protected $fillable = ['surname','othernames','phone','email','countryOfOrigin','stateOfOrigin','lga','address'];
	
    public function students()
    {
    	return $this->hasMany(Student::class);
    }

}
