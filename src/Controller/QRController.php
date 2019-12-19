<?php

namespace App\Controller;

use App\Repository\PictureRepository;
use App\Service\QrService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class QRController extends AbstractController
{
    /**
     * @Route("/qr", name="qr")
     * @return Response
     */
    public function index(PictureRepository $pictureRepository): Response
    {
        $counts = $pictureRepository->findAll();
        return $this->render('qr.html.twig', [
            'counts'=> $counts
        ]);
    }



    /**
     * @Route("/generate", name="qr_generate")
     * @return Response
     */
    public function generateQR(QrService $qrService){

        $qrService->CreateQr();
        return $this->render('generate.html.twig');

    }
}
