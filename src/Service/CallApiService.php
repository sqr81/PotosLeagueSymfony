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
    
    //les joueurs blesses
    public function getNflInjuredPlayer(): array
    {
        return $this->getApi('projections/json/InjuredPlayers?');
    }

    //les news nfl
    public function getNflNewsDatas(): array
    {
        return $this->getApi('scores/json/News?');
    }

    //les stats par équipes et par saison
    public function getTeamSeasonData(): array
    {   
        $season="2021REG?";
        return $this->getApi('scores/json/TeamSeasonStats/' .$season);
    }

    //classement nfl
    public function getNflStandings(): array
    {
        $season="2021REG?";
        return $this->getApi('scores/json/standings/' .$season);
    }

    //la fonction mère
    private function getApi(string $var)
    {
        $key='key=cfef16c7596f47cf9e27534143443138';

        $response = $this->client->request(
            'GET',
            'https://api.sportsdata.io/v3/nfl/' .$var.$key         
        );

        return $response->toArray();
    }

}