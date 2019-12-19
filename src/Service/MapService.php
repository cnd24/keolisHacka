<?php


namespace App\Service;
use Symfony\Component\HttpClient\HttpClient;



class MapService
{
    public function getMarkers(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?dataset=liste-des-stations-velo-2018-orleans-metropole');
        $content = $response->toArray();

        for($i=0; $i<count($content['records']); $i++){
            $coordinates[] = $content['records'][$i]['fields']['pointgeo'];
        }
        return $coordinates;
    }
}
