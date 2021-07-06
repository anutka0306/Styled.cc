<?php

namespace App\Controller;

use App\Service\LocationService;
use App\Form\SalonFilterType;
use App\Service\SalonManager;
use App\Repository\ContentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SimplePageController extends AbstractController
{
    /**
     * @var ContentRepository
     */
    protected $page_repository;

    /**
     * @var LocationService
     */
    protected $location_service;

    /**
     * @var SalonManager
     */
    protected $salon_manager;

    public function __construct(ContentRepository $repository, LocationService $location_service, SalonManager $salon_manager)
    {
        $this->page_repository          = $repository;
        $this->location_service         = $location_service;
        $this->salon_manager            = $salon_manager;
    }
    /**
     * @Route("/paint/", name="paint")
     */
    public function paint(Request $request)
    {
        $page = $this->page_repository->findOneByToken('paint');
        $location = $this->location_service->getLocation($request);
        if ($location) {
            $page->setLocation($location);
        }

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => $page->getPriceBrand()]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, $page->getPriceBrand());

        return $this->render('v2/pages/simple_page/paint.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
    /**
     * @Route("/uslugi/", name="uslugi")
     */
    public function uslugi(Request $request)
    {
        $page = $this->page_repository->findOneByToken('uslugi');

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => $page->getPriceBrand()]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, $page->getPriceBrand());

        return $this->render('v2/pages/simple_page/uslugi.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
    /**
     * @Route("/price_list/", name="price_list")
     */
    public function price_list(Request $request)
    {
        $page = $this->page_repository->findOneByToken('price_list');

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => $page->getPriceBrand()]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, $page->getPriceBrand());

        return $this->render('v2/pages/simple_page/price_list.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
    /**
     * @Route("/calculator/", name="calculator")
     */
    public function calculator(Request $request)
    {
        $page = $this->page_repository->findOneByToken('calculator');

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => $page->getPriceBrand()]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, $page->getPriceBrand());

        $isMobile = (bool)mb_ereg("mobile", strtolower($_SERVER['HTTP_USER_AGENT']));
        //$isMobile = true;
        return $this->render('v2/pages/simple_page/calculator.html.twig', [
            'page' => $page,
            'isMobile' => $isMobile,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
}
