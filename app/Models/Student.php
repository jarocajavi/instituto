<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'email', 'phone', 'birth_date'];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class)->withPivot('completed');
    }
}
