<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglog extends Model
{
    //
    protected $table = 'login';
    protected $fillable = [
        'firstname', 'lastname','email','password',
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
