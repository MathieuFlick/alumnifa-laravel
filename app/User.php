<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Students;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'firstname', 'lastname', 'dob', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'dob'
    ];

    public static function checkStudent(Array $datas)
    {
        $student = Students::where([
            ['firstname', '=', $datas['firstname']],
            ['lastname', '=', $datas['lastname']],
            ['dob', '=', $datas['dob']]
        ])->first();

        if($student) {
            return true;
        } else {
            return false;
        }
    }
}
