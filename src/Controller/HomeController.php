<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Author;
use App\Repository\AuthorRepository;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(AuthorRepository $authorRepository): Response
    {
		
		$authors = $authorRepository->findAll();
		
		//dd($authors);
		
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
			'authors' => $authors,
        ]);
    }
}
