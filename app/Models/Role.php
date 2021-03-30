<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'roleName',
        'description',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

//    function setRoleNameAttribute($value){
//        $this->attributes['roleName'] = Str::upper($value);
//    }

//    function getRoleNameAttribute($value){
//        return $value . " - роль";
//    }
}
