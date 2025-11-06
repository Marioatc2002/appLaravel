<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    /**
     * 
     * 
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        
        $courses = Course::with('roboticsKit')->get();
        
        return response()->json($courses);
    }

    /**
     * 
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        
        $validator = Validator::make($request->all(), [
            'course_key' => 'required|string|unique:courses|max:255',
            'course_name' => 'required|string|max:255',
            'robotics_kit_id' => 'required|exists:robotic_kits,id',
            'image' => 'nullable|string|max:255', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); 
        }

    
        $course = Course::create($validator->validated());


        return response()->json($course, 201);
    }

    /**
     * 
     * 
     *
     * @param  \App\Models\Course  
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Course $course): JsonResponse
    {
  
        $course->load('roboticsKit');
        
        return response()->json($course);
    }

    /**
     * 
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Course $course): JsonResponse
    {
        
        $validator = Validator::make($request->all(), [
            'course_key' => 'sometimes|required|string|unique:courses,course_key,' . $course->id . '|max:255',
            'course_name' => 'sometimes|required|string|max:255',
            'robotics_kit_id' => 'sometimes|required|exists:robotic_kits,id',
            'image' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

      
        $course->update($validator->validated());

        return response()->json($course);
    }

    /**
     * 
     * 
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Course $course): JsonResponse
    {
        $course->delete();

        // Retornamos una respuesta vacía con estado 204 (No Content)
        return response()->json(null, 204);
    }
}