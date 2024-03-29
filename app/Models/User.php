<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  implements LaratrustUser
{
    use HasApiTokens, HasFactory, Notifiable,HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function todos(){
        return $this->hasMany(Todos::class);
    }
    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }

    public function getRedirectRoute()
    {
        if ($this->hasRole('admin')) {
            return 'admindashboard';
        }elseif ($this->hasRole('todolistuser')) {
            return 'userdashboard';
        }elseif ($this->hasRole('propriétaire')){
            return 'userdashboard';
            # code...
        }
    }

}
