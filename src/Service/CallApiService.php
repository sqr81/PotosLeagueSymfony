<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    
    public function getNflData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.sportsdata.io/v3/nfl/scores/json/News?key=cfef16c7596f47cf9e27534143443138'          
        );
        return $response->toArray();
    }
}