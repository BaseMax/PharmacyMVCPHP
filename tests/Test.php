<?php

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private static $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoiYWxpIiwiZmFtaWx5IjoiYWhtYWRpIiwiZXhwIjoxOTk3NDIxNjc1fQ.1m7nzPusjSQqOZ4Ret645R_wdD89nhHcncUk5HgzxeU";

    public function test_get_successfuly()
    {
        $client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost:5000/api',
            'headers' => [
                'Authorization' => 'Bearer ' . self::$token
            ]
        ]);
        $response = $client->get("inventory");

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    public function test_unauthorized()
    {
        $client = new GuzzleHttp\Client(['base_uri' => 'http://localhost:5000/api']);
        $response = $client->get("inventory");
        $this->assertEquals(401, $response->getStatusCode());
    }

    public function test_get_by_id()
    {
        $client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost:5000/api',
            'headers' => [
                'Authorization' => 'Bearer ' . self::$token
            ]
        ]);

        $response = $client->get("inventory/1");
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_register()
    {
        $client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost:5000/api',
            'headers' => [
                'Authorization' => 'Bearer ' . self::$token,
                'Content-Type' => 'application/json'
            ]
        ]);

        $user = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'secret'
        ];

        $response = $client->post('auth/register', [
            'json' => $user
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }
}
