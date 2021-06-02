<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * JSON success response
     *
     * @param string $message
     * @param mixed $data
     * @param int $httpStatusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondSuccess(string $message="Successful", $data=null, $httpStatusCode=200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $httpStatusCode);
    }

    /**
     * JSON error response
     *
     * @param string $message
     * @param mixed $data
     * @param int $httpStatusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondError(string $message="Error occurred", $data=null, $httpStatusCode=400) {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $httpStatusCode);
    }

}
