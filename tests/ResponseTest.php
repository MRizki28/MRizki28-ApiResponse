<?php

namespace MRizki28\ApiResponse\Tests;

use MRizki28\ApiResponse\ApiResponse;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    protected $apiResponse;

    public function setUp(): void
    {
        $this->apiResponse = new ApiResponse();
    }

    public function test_success_response()
    {
        $response = $this->apiResponse->success([
            'name' => 'Muhammad Rizki'
        ], 'Success', 200);

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'status' => 'success',
                'message' => 'Success',
                'data' => ['name' => 'Muhammad Rizki']
            ]),
            $response->getContent()
        );

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_noFound_response()
    {
        $response = $this->apiResponse->notFound('Data not found', 404);

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'status' => 'Data not found',
                'message' => 'Data not found'
            ]),
            $response->getContent()
        );

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function test_error_response(){
        $th = new \Exception('Error here');
        $response = $this->apiResponse->error($th , 'Error', 500);

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'status' => 'error',
                'message' => 'Error',
                'error' => [
                    'message' => 'Error here',
                    'file' => $th->getFile(),
                    'line' => $th->getLine(),
                    'trace' => $th->getTrace()
                ]
            ]),
            $response->getContent()
        );

        $this->assertEquals(500, $response->getStatusCode());
    }
}
