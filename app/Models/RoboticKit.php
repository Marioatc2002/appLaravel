<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course; // Importamos el modelo Course

class RoboticKit extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name'];

    /**
     * Relación: Un kit puede tener muchos cursos
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
