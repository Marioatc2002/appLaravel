<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class TestController extends Controller
{
    // 1. Index - obtener todos los registros
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    // 2. Create - crear un curso
    public function create()
    {
        $course = Course::create([
            'course_key' => 'Rob105',
            'title' => 'Sensors in Robotics',
            'course_cover' => 'cover.jpg',
            'content' => 'Basic introduction to sensors',
            'didactic_material' => 'PDF sensors guide',
            'robotics_kit' => 'SensorKit'
        ]);

        return response()->json($course);
    }

    // 3. Read - obtener un registro por id
    public function read($id)
    {
        $course = Course::findOrFail($id);
        return response()->json($course);
    }

    // 4. Update - actualizar curso
    public function update($id)
    {
        $course = Course::findOrFail($id);
        $course->update([
            'title' => 'Updated Course Title',
            'content' => 'Updated content here...'
        ]);

        return response()->json($course);
    }

    // 5. Delete - eliminar curso
    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json(['message' => 'Course deleted successfully']);
    }
}
