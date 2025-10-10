<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoboticsKit extends Model
{
    use HasFactory;

    protected $table = 'robotic_kits'; // 👈 fuerza a Eloquent a usar el nombre correcto

    protected $fillable = ['name'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'robotics_kit_id');
    }
}
