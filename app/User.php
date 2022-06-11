<?php

namespace App;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
=======
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD
    protected $fillable = [
        'name', 'email', 'password',
    ];

=======

    protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'username',
    ];


    // p

>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

<<<<<<< HEAD
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
=======
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
}
