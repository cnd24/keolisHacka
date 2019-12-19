<?php

namespace App\Controller;

use App\Repository\PictureRepository;
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
    public function index(MapService $mapService, PictureRepository $pictureRepository): Response
    {
        $infoStations = $mapService->getInfoStations();
        $infoParks = $mapService->getInfoParks();
        $infoBus = $mapService->getInfoBus();
        $counts = $pictureRepository->findAll();


        return $this->render('map.html.twig', [
            'infoStations' => $infoStations,
            'infoParks' => $infoParks,
            'infoBus' => $infoBus,
            'counts'=> $counts
        ]);
    }


}
