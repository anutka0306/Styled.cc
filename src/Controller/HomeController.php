<?php

namespace App\Controller;

use App\Service\LocationService;
use App\Repository\ContentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var LocationService
     */
    protected $location_service;

    public function __construct(LocationService $location_service)
    {
        $this->location_service = $location_service;
    }
    /**
     * @Route("/", name="home")
     */
    public function index(ContentRepository $repository, Request $request)
    {
        $page = $repository->findOneBy(['path'=>'/']);

        $location = $this->location_service->getLocation($request);
        if ($location) {
            $page->setLocation($location);
        }
        return $this->render('v2/pages/home/index.html.twig', [
            'page' => $page,
        ]);
    }
}
