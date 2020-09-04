<?php

namespace App\Http\Controllers\Api\v1;

use App\Course;
use App\Http\Resources\v1\Course as CourseResource;
use App\Http\Resources\v1\CourseCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return new CourseCollection($courses);
    }
}
