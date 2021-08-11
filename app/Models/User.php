<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

# Remove unused classes
# Correct indentations
# Remove additional blank lines

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[

        ];

    # Remove after you see and understand
    /**
     *  company_id, name, idenetification_number, created_at, updated_at
     */
    
    /**
     *    protected $guarded = [
     *      'company_id',
     *      'idenetification_number',
     *   ];
     */

    /**
     * protected $fillable = [
     *  'name',
     *  'created_at',
     *  'updated_at',
     *  ];
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public  function  setPasswordAttribute($password){
        $this->attributes['password']=bcrypt($password);

    }

}
