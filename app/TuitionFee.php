<?php

namespace App;

use App\FeeType;
use App\StudentFee;
use App\Term;
use App\YearGroup;
use Illuminate\Database\Eloquent\Model;

class TuitionFee extends Model
{
    protected $fillable = ['amount','start_date','end_date','description','year_group_id','term_id', 'fee_type_id'];

    public function yearGroup()
    {
    	return $this->belongsTo(YearGroup::class);
    }

    public function term()
    {
    	return $this->belongsTo(Term::class);
    }

    public function studentFees()
    {
    	return $this->hasMany(StudentFee::class);
    }

    public function feeType()
    {
        return $this->belongsTo(FeeType::class);
    }
}
