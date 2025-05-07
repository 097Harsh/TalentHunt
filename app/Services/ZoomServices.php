<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ZoomServices
{

    //zoo client config details....
    protected $client;
    private $client_id = 'JSnPH8sOR1iRrcM9ct4UUw';
    private $client_secret = 'z1Gxwy16fxDODXseICOz2fE04ZDexeJE';
    private $account_id = 'Vtq28BYoR9y-IEASKHKWKA';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.zoom.us/v2/', // Base URL for Zoom API
            'timeout'  => 30.0,
        ]);
    }

    /**
     * Get Zoom Access Token
     */
    private function getAccessToken()
    {
        try {
            $response = $this->client->post('https://zoom.us/oauth/token', [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode($this->client_id . ':' . $this->client_secret),
                    'Content-Type'  => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'grant_type' => 'account_credentials',
                    'account_id' => $this->account_id,
                ],
            ]);

            $tokenData = json_decode($response->getBody(), true);
            return $tokenData['access_token'];
        } catch (RequestException $e) {
            \Log::error('Zoom API Token Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Create a Zoom Meeting
     */
    public function createMeeting($topic, $startTime, $duration, $timezone)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            \Log::error('Failed to retrieve Zoom access token.');
            return null;
        }

        try {
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
                    'password'   => rand(100000, 999999), // Auto-generated password
                    'settings'   => [
                        'host_video'        => true,
                        'participant_video' => true,
                        'join_before_host'  => false,
                        'mute_upon_entry'   => true,
                        'waiting_room'      => true,
                    ],
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            \Log::error('Zoom Meeting Creation Error: ' . $e->getMessage());
            return null;
        }
    }
}
