<?php

namespace App\Controller;

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
    public function index(): Response
    {

        return $this->render('qr.html.twig');
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
