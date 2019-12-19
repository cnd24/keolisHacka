<?php


namespace App\Service;
use Symfony\Component\HttpClient\HttpClient;



class MapService
{

    public function getInfoStations(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?dataset=liste-des-stations-velo-2018-orleans-metropole&rows=35');
        $content = $response->toArray();

        for($i=0; $i<count($content['records']); $i++){
            $infoStations[] = $content['records'][$i]['fields'];
        }
        return $infoStations;
    }

    public function getInfoParks(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?dataset=mobilite-places-disponibles-parkings-en-temps-reel&rows=30');
        $content = $response->toArray();

        for($i=0; $i<count($content['records']); $i++){
            $infoParks[] = $content['records'][$i]['fields'];
        }
        return $infoParks;
    }


    public function getInfoBus(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://data.orleans-metropole.fr/api/records/1.0/search/?dataset=tao_ligne_bus_od');
        $content = $response->toArray();

        for($i=0; $i<count($content['records']); $i++){
            $infoBus[] = $content['records'][$i]['fields'];
        }
        return $infoBus;
    }





}
