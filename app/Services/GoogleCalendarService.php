<?php
// app/Services/GoogleCalendarService.php
namespace App\Services;

use Google_Client;
use Google_Service_Calendar;

class GoogleCalendarService
{
    public static function getClient()
    {
        $client = new Google_Client();
        $client->setAuthConfig(base_path(env('GOOGLE_CREDENTIALS_PATH')));
        $client->setRedirectUri('http://127.0.0.1:8000/auth/callback');  // Replace with your actual URL in production
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load token.json if it exists
        $tokenPath = storage_path('app/token.json');
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        // Refresh the token if it's expired
        if ($client->isAccessTokenExpired()) {
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                file_put_contents($tokenPath, json_encode($client->getAccessToken()));
            } else {
                // This part only happens once to generate a new token
                $authUrl = $client->createAuthUrl();
                echo "Open this link in your browser: <a href='$authUrl'>$authUrl</a>";
                exit;
            }
        }

        return $client;
    }
}
