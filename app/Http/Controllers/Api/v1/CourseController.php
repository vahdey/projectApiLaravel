<?php

namespace App\Http\Controllers\Api\v1;
use App\Exceptions\CourseIsPrivateException;
use App\Course;
use App\Http\Resources\v1\Course as CourseResource;
use App\Http\Resources\v1\CourseCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(2);
        return new CourseCollection($courses);
    }

    public function single(Course $course)
    {
        throw new CourseIsPrivateException();
        return new CourseResource($course);
    }
}
