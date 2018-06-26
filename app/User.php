<?php

namespace App;

use App\Exam;
use App\FeeException;
use App\Promotion;
use App\StudentFee;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function studentFees()
    {
        return $this->hasMany(StudentFee::class);
    }

    public function feeExceptions()
    {
        return $this->hasMany(FeeException::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
}
