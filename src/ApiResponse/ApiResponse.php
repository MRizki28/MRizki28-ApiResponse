<?php


namespace MRizki28\ApiResponse;

use Symfony\Component\HttpFoundation\Response;

class ApiResponse
{

    /**
     * Format a successful response.
     *
     * @param array $data Data to include in the response.
     * @param string $message Message to include in the response.
     * @param int $code HTTP status code.
     * @return string JSON formatted response.
     */

    public static function success($data = [], $message = 'Success', int $code =  200)
    {
        return new Response(
            json_encode([
                'status' => 'success',
                'message' => $message,
                'data' => $data
            ]),
            $code,
            ['Content-Type' => 'application/json']
        );
    }

    /**
     * Format an data not found response.
     *
     * @param string $message Message to include in the response.
     * @param int $code HTTP status code.
     * @return string JSON formatted response.
     */

    public static function notFound($message = 'Data not found', int $code = 404)
    {
        return new Response(
            json_encode([
                'status' => 'Data not found',
                'message' => $message
            ]),
            $code,
            ['Content-Type' => 'application/json']
        );
    }
}
