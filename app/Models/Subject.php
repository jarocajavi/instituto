<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'code', 'description', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
