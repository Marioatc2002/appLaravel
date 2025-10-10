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
        'robotics_kit_id',
    ];

    public function roboticsKit()
    {
        return $this->belongsTo(RoboticsKit::class, 'robotics_kit_id');
    }
}
