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
    
    //les news nfl
    public function getNflNewsDatas(): array
    {
        return $this->getApi('News?');
    }

    //les stats par équipes et par saison
    public function getTeamSeasonData(): array
    {   
        $season="2021REG?";
        return $this->getApi('TeamSeasonStats/' .$season);
    }

    //classement nfl
    public function getNflStandings(): array
    {
        $season="2021REG?";
        return $this->getApi('standings/' .$season);
    }

    //la fonction mère
    private function getApi(string $var)
    {
        $key='key=cfef16c7596f47cf9e27534143443138';

        $response = $this->client->request(
            'GET',
            'https://api.sportsdata.io/v3/nfl/scores/json/' .$var.$key         
        );

        return $response->toArray();
    }

}