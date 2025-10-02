<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_key',
        'course_name',
        'robotic_kit_id'
    ];

    /**
     * Relación: un curso pertenece a un Robotic Kit
     */
    public function roboticsKit()
    {
        return $this->belongsTo(RoboticKit::class, 'robotic_kit_id');
    }
}
