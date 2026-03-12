<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    // protected $fillable = ['name', 'description','hours','start_date'];
    //nombre de tabla
    protected $table = "projects";
    //nombre de la clave
    protected $primaryKey="id";
    //el tipo de la clave
    protected $keyType = 'integer';
    //Clave numérica espera que sea autoincrement
    protected $autoincrement = true;

    //Espera tener los campos create_at y update_at
    public $timestamps = true;
    static public function getLabels()
    {
        return __('projects');
    }


}
