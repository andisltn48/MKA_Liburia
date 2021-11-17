<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
<<<<<<< HEAD
    use HasAPiTokens, Notifiable;
=======
    use HasAPiTokens, Notifiable; 
>>>>>>> update integrasi dashboard admin

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD
    protected $fillable = [
        'fullname', 'username', 'email', 'password', 'phone', 'photo'
    ];
=======

    protected $table = "users";
    protected $primaryKey = "id";

    protected $fillable = [
        'fullname', 'username', 'email', 'password', 'phone' //'photo' 
    ];
    
        
    public function pemesanantiket()
    {
        return $this->hasMany(PemesananTiket::class);
    }
    
>>>>>>> update integrasi dashboard admin

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
}
