<?php
// src/Controller/DefaultController

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\LineRepository;
use App\Repository\PictureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     * @param CategoryRepository $categoryRepository
     * @param LineRepository $lineRepository
     * @param PictureRepository $pictureRepository
     * @return Response
     */

    public function index(
        CategoryRepository $categoryRepository,
        LineRepository $lineRepository,
        PictureRepository $pictureRepository
    ) {
        $categories = $categoryRepository->findAll();
        $lines = $lineRepository->findAll();
        $picture = $pictureRepository->findAll();

        return $this->render('Page_Keodex/keodex.html.twig', [
            'categories' => $categories,
            'lines' => $lines,
            'picture' => $picture
        ]);
       }
}