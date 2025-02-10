<?php

namespace App\Services;

use GuzzleHttp\Client;

class ZoomServices
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('ZOOM_BASE_URL'),
            'timeout'  => 30.0,
        ]);
    }

    private function getAccessToken()
    {
        try {
            $response = $this->client->post('https://zoom.us/oauth/token', [
                'auth' => [env('ZOOM_CLIENT_ID'), env('ZOOM_CLIENT_SECRET')],
                'form_params' => [
                    'grant_type' => 'account_credentials',
                    'account_id' => env('ZOOM_ACCOUNT_ID'),
                ],
            ]);
    
            $tokenData = json_decode($response->getBody(), true);
            return $tokenData['access_token'];
        } catch (\Exception $e) {
            \Log::error('Zoom API Error: ' . $e->getMessage());
            throw $e;  // Re-throw the exception for further handling
        }
    }
    


    /*
        private function getAccessToken()
        {
            $response = $this->client->post('oauth/token', [
                'auth' => [env('ZOOM_CLIENT_ID'), env('ZOOM_CLIENT_SECRET')],
                'form_params' => [
                    'grant_type' => 'account_credentials',
                    'account_id' => env('ZOOM_ACCOUNT_ID'),
                ],
            ]);

            $tokenData = json_decode($response->getBody(), true);
            return $tokenData['access_token'];
        }
    */
    public function createMeeting($topic, $startTime, $duration, $timezone)
    {
        $accessToken = $this->getAccessToken();

        $response = $this->client->post('users/me/meetings', [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type'  => 'application/json',
            ],
            'json' => [
                'topic'      => $topic,
                'type'       => 2, // Scheduled meeting
                'start_time' => $startTime, // Format: 2025-02-10T10:00:00Z
                'duration'   => $duration, // Duration in minutes
                'timezone'   => $timezone,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
