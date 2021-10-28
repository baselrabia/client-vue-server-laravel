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

/**
 * uploadFile
 */
if (!function_exists('uploadFile')) {
    function uploadFile($path, $file)
    {
        // $baseDir = 'uploads/' . $path;
        // $baseDir =   $path;

        $name = sha1(time() . $file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $fileName = "{$name}.{$extension}";
        Storage::putFileAs($path, $file, $fileName);

        //$file->move(public_path() . '/' . $baseDir, $fileName);

        // return "{{$baseDir}}/{{$fileName}}";
        $filePath = 'storage/' . $path . '/' . $fileName;
        return $filePath;
    }
}
