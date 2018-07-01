<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'workload', 'teacher', 'description'
    ];

    public function students()
    {
        return $this->beLongsToMany('App/Models/Student');
    }
}