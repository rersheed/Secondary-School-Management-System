<?php

namespace App;

use App\Student;
use App\TuitionFee;
use App\User;
use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    protected $fillable = ['tuition_fee_id','student_id','user_id','amount'];

    public function tuitionFee()
    {
    	return $this->belongsTo(TuitionFee::class);
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getSessionPayments()
    {
        $feeIds = YearGroup::findOrFail((new YearGroup)->getCurrentSession())->tuitionFees;
        $tuition = new TuitionFee;
        $payments = [];
        foreach ($feeIds as $fee) {
            $payments = $tuition->find($fee->id)->studentFees;
        }
        return $payments;
    }

    public function getTermPayments($id)
    {
        $feeIds = Term::findOrFail($id)->tuitionFees;
        $tuition = new TuitionFee;
        $payments = [];
        foreach ($feeIds as $fee) {
            $payments = $tuition->find($fee->id)->studentFees;
        }
        return $payments;
    }
   
}
