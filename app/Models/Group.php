<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'code', 'course'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
