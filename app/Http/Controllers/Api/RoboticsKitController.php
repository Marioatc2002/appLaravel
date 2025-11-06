<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoboticsKit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse; 


class RoboticsKitController extends Controller
{
    public function index(): JsonResponse
    {
        $kits = RoboticsKit::with('courses')->get();
        
        return response()->json([
            'success' => true,
            'data' => $kits
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:robotic_kits',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $kit = new RoboticsKit();
        $kit->name = $request->input('name');

        if ($request->hasFile('image')) {
          
            $path = $request->file('image')->store('kits_images', 'public');
            $kit->image = $path;
        }

        $kit->save();

        return response()->json([
            'success' => true,
            'message' => 'Robotics Kit created successfully.',
            'data' => $kit
        ], 201);
    }

    public function show(RoboticsKit $robotic): JsonResponse 
    {
        $robotic->load('courses');

        return response()->json([
            'success' => true,
            'data' => $robotic
        ]);
    }

    public function update(Request $request, RoboticsKit $robotic): JsonResponse 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255|unique:robotic_kits,name,' . $robotic->id,
            'image' => 'nullable|sometimes|image|mimes:jpg,png,jpeg,gif|max:2048',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->has('name')) {
            $robotic->name = $request->input('name');
        }

        if ($request->hasFile('image')) {
            if ($robotic->image) {
                Storage::disk('public')->delete($robotic->image);
            }
            $path = $request->file('image')->store('kits_images', 'public');
            $robotic->image = $path;
        }

        $robotic->save();

        return response()->json([
            'success' => true,
            'message' => 'Robotics Kit updated successfully.',
            'data' => $robotic
        ]);
    }

    public function destroy(RoboticsKit $robotic): JsonResponse // Cambiado a $robotic
    {
        if ($robotic->image) {
            Storage::disk('public')->delete($robotic->image);
        }

        $robotic->delete();

        return response()->json([
            'success' => true,
            'message' => 'Robotics Kit deleted successfully.'
        ]);
    }
}