<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'account',
        'lastLogin_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['lastLogin_at'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        return $this->roles->pluck('roleName')->contains('gKRL-Adm-Techportal');
    }
    
    public function isCgms()
    {
        return $this->roles->pluck('roleName')->contains('gKRL-Cgms-Techportal');
    }

    public function isFuel()
    {
        return $this->roles->pluck('roleName')->contains('gKRL-Fuel-Techportal');
    }

    function hasRole($role) {
        return $this->roles->pluck('roleName')->contains($role);
    }

}
