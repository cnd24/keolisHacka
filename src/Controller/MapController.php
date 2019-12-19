<?php

namespace App\Controller;

use App\Service\MapService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class MapController extends AbstractController
{
    /**
     * @Route("/map", name="map")
     * @return Response
     */
    public function index(MapService $mapService): Response
    {
        $infoStations = $mapService->getInfoStations();

        return $this->render('map.html.twig', [
            'infoStations' => $infoStations,
        ]);
    }
}
