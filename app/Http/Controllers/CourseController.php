<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Courses
        $courses = Course::paginate(15);

        //Return collection of Courses as a resource
        return CourseResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create($request->all());

        if ($course) {
            return new CourseResource($course);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        if (!$course->id) {
            return response()->json([
                'message' => 'Course Not Found',
            ], Response::HTTP_NOT_FOUND);
        }

        // Return single course as a resource
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        if ($course->update($request->all())) {
            //Return a course updated
            return new CourseResource($course);

        } elseif (!$couse->id) {
            //Curso não encontrado
            return response()->json([
                'message' => 'Course Not Found',
            ], Response::HTTP_NOT_FOUND);

        } else {
            return response()->json([
                'message' => 'Internal Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if (!$course->id) {
            return response()->json([
                'message' => 'Course Not Found',
            ], Response::HTTP_NOT_FOUND);
        }
        return response()->json(
            $course->delete(), Response::HTTP_NO_CONTENT
        );
    }
}
