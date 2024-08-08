<?php


namespace MRizki28\ApiResponse;

class ApiResponse{

    /**
     * Format a successful response.
     *
     * @param array $data Data to include in the response.
     * @param string $message Message to include in the response.
     * @param int $code HTTP status code.
     * @return string JSON formatted response.
     */

    public static function success($data = [], $message = 'Success', $code = 200){
        http_response_code($code);
        
        return json_encode([
            'status' => 'success',
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }
}