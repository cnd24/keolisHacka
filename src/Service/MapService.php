<?php


namespace App\Service;
use Symfony\Component\HttpClient\HttpClient;



class MapService
{
    public function getMap()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.github.com/repos/symfony/symfony-docs');
    }
}
