<?php

namespace App\ApiHelper;
use Symfony\Component\HttpFoundation\Response;
use \Illuminate\Http\JsonResponse;

class ApiHelper
{
    public static function responseSuccessWithData($message, $data):JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'message' => $message,
                'data' => $data
            ]
        );
    }

    public static function responseJson($data):JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'data' => $data
            ]
        );
    }


    public static function responseJsonValidationErrorWithPath($message, $errorType, $path, $status):JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => [
                'message' => $message,
                "error_type" => $errorType,
                "path" => $path
            ]
        ], $status);
    }

    private static function errorResponse($message, $error_type, $status):JsonResponse
    {
        return response()->json(
            ["success" => false,
                "message" => $message,
                "error_type" => $error_type
            ], $status);
    }

    public static function responseCreateJson($data):JsonResponse
    {
        return self::responseSuccessWithData("Record has been created successfully", $data);
    }

    public static function responseUpdateJson($data):JsonResponse
    {
        return self::responseSuccessWithData("Record has been updated successfully", $data);
    }

    public static function responseDelJson():JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'message' => "Record has been deleted successfully"
            ]
        );
    }

    public static function responseDeleteErrorJson():JsonResponse
    {
        return self::errorResponse(
            "Cannot delete or update a parent row, please delete child rows first.",
            "PARENT_DATA",
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    public static function responseJsonInternalServerError():JsonResponse
    {
        return self::errorResponse(
            "Internal server error, please contact system administrator",
            "INTERNAL_SERVER_ERROR",
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    public static function responseJsonValidationError($message ,$path):JsonResponse
    {
        return self::responseJsonValidationErrorWithPath($message,
            "VALIDATION_ERROR",
            $path,
            Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function responseJsonRecordNotFound():JsonResponse
    {
        return self::errorResponse(
            "Record not found!",
            "RECORD_NOT_FOUND",
            Response::HTTP_BAD_REQUEST
        );
    }

    public static function responseJsonUnsupportedParameters($errors)
    {
        return self::responseJsonValidationErrorWithPath("Unsupported Parameters",
            "UNSUPPORTED_PARAMETER",
            $errors,
            Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function unsupportedParameters(array $request, array $supportedParam)
    {
        $unsupportedArray = array();
        foreach ($request as $key => $value) {
            if (!in_array($key, $supportedParam)) {
                $unsupportedArray.array_push($key);
            }
        }
        return $unsupportedArray;
    }

}
