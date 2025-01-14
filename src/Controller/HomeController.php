<?php

namespace App\Controller;

use App\Class\Mail;
use App\Repository\HeaderRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HeaderRepository $headerRepository, ProductRepository $productRepository): Response
    {
        return $this->render('home/index.html.twig',[
            "headers" => $headerRepository->findAll(),
            "flagship" => $productRepository->findByIsFlagship(true),
        ]);
    }
}
