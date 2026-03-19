<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'code', 'description'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
