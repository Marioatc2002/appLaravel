<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\RoboticsKit;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('roboticsKit')->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $kits = RoboticsKit::all();
        return view('courses.create', compact('kits'));
    }

    public function store(Request $request)
{
    $request->validate([
        'course_key' => 'required|unique:courses',
        'course_name' => 'required',
        'robotics_kit_id' => 'required|exists:robotic_kits,id',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $archivo = $request->file('image');
    $nombreArchivo = time() . '-' . $archivo->getClientOriginalName();
    $archivo->move(public_path('fotosCourses'), $nombreArchivo);

    Course::create(array_merge($request->all(), ['image' => $nombreArchivo]));

    return redirect()->route('courses.index')->with('success', 'Course created successfully.');
}

    public function edit(Course $course)
    {
        $kits = RoboticsKit::all();
        return view('courses.edit', compact('course', 'kits'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_key' => 'required|unique:courses,course_key,' . $course->id,
            'course_name' => 'required',
            'robotics_kit_id' => 'required|exists:robotics_kits,id'
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
