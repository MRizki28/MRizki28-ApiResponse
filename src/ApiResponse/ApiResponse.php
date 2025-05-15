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
     * @param int $code HTTP status code.
     * @return string JSON formatted response.
     */

    public static function notFound(int $code = 404)
    {
        return new Response(
            json_encode([
                'status' => 'not found',
                'message' => 'Data not found'
            ]),
            $code,
            ['Content-Type' => 'application/json']
        );
    }

    /**
     * Format an error response.
     *
     * @param string $message Message to include in the response.
     * @param int $code HTTP status code.
     * @return string JSON formatted response.
     * @param \Throwable|null only method Throwable
     */

    public static function error(\Throwable $th = null, $message = 'Error', int $code = 500)
    {
        $errorDetail = null;
        if ($th) {
            $errorDetail = [
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
                'trace' => $th->getTrace()
            ];
        }
        return new Response(
            json_encode([
                'status' => 'error',
                'message' => $message,
                'error' => $errorDetail
            ]),
            $code,
            ['Content-Type' => 'application/json']
        );
    }

    /**
     * Format an unauthorized response.
     *
     * @return string JSON formatted response.
     */

    public static function unauthorized()
    {
        return new Response(
            json_encode([
                'status' => 'Unauthorized',
                'message' => 'Unauthorized'
            ]),
            401,
            ['Content-Type' => 'application/json']
        );
    }


    /**
     * Format a custom response.
     *
     * @param array $data Data to include in the response.
     * @param int $code HTTP status code.
     * @return string JSON formatted response.
     */

    
    public static function custom(array $data = [] , int $code = 200)
    {
        return new Response(
            json_encode($data),
            $code,
            ['Content-Type' => 'application/json']
        );
    }
}
