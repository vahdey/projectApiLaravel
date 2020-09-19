<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CourseIsPrivateException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return $request->expectsJson()
            ? new JsonResponse([
                'data' => 'course is private',
                'status' => 'error'
            ], Response::HTTP_UNAUTHORIZED)
            : view('errors.courseisprivate');
    }
}
