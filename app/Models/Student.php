<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'phone', 'email', 'birth', 'sex', 'home_address'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function courses()
    {
        return $this->belongsToMany('App/Models/Course');
    }
}
