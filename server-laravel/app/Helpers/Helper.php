<?php

use Illuminate\Http\JsonResponse;



function ErrorResponse($data, $message = "", $status = 400): JsonResponse
{
    return response()->json([
        'message' => $message,
        'errors' => $data
    ], $status);
}


function SuccessResponse($data, $message = "", $status = 200): JsonResponse
{
    return response()->json([
        'message' => $message,
        'data' => $data
    ], $status);
}