<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\Model;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\Simple;
use App\Entity\Vacancy;
use App\Form\SalonFilterType;
use App\Service\SalonManager;
use App\Service\LocationService;
use App\Repository\ContentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @var ContentRepository
     */
    protected $page_repository;

    /**
     * @var SalonManager
     */
    protected $salon_manager;

    /**
     * @var LocationService
     */
    protected $location_service;

    protected $availableSalons;
    
    public function __construct(ContentRepository $repository, SalonManager $salon_manager, LocationService $location_service)
    {
        $this->page_repository          = $repository;
        $this->salon_manager            = $salon_manager;
        $this->location_service         = $location_service;
    }
    
    /**
     * @Route("/{token}", name="dynamic_pages",requirements={"token"= ".+\/$"})
     */
    public function index($token, Request $request)
    {
        if ( ! $page = $this->page_repository->findOnePublishedByToken($token)) {
            throw $this->createNotFoundException(sprintf('Page %s not found',$token));
        }

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
        $this->availableSalons = $this->salon_manager->getSalonsByFilterForm($form, $page->getPriceBrand());

        if ($page instanceof Brand) {
            return $this->brand($page, $form);
        }

        if ($page instanceof Model) {
            return $this->model($page, $form);
        }

        if ($page instanceof Service) {
            return $this->service($page, $form);
        }

        if ($page instanceof RootService) {
            return $this->rootService($page, $form);
        }

        if ($page instanceof Simple) {
            return $this->simple($page, $form);
        }

        if ($page instanceof Vacancy) {
            return $this->vacancy($page, $form);
        }

        throw $this->createNotFoundException('Page is instance of '.get_class($page));
    }
    
    
    private function brand(Brand $brand, $form)
    {
        return $this->render('v2/pages/brand.html.twig', [
            'page' => $brand,
            'form' => $form->createView(),
            'availableSalons' => $this->availableSalons,
        ]);
    }
    
    
    private function model(Model $model, $form)
    {
        return $this->render('v2/pages/model.html.twig', [
            'page' => $model,
            'form' => $form->createView(),
            'availableSalons' => $this->availableSalons,
        ]);
    }
    
    private function service(Service $service, $form)
    {
        return $this->render('v2/pages/service.html.twig', [
            'page' => $service,
            'form' => $form->createView(),
            'availableSalons' => $this->availableSalons,
        ]);
    }
    
    private function rootService(RootService $rootService, $form)
    {
        return $this->render('v2/pages/root-service.html.twig', [
            'page' => $rootService,
            'form' => $form->createView(),
            'availableSalons' => $this->availableSalons,
        ]);
    }
    
    private function simple(Simple $simple, $form)
    {
        return $this->render('v2/pages/simple.html.twig', [
            'page' => $simple,
            'form' => $form->createView(),
            'availableSalons' => $this->availableSalons,
        ]);
    }
    
    private function vacancy(Vacancy $vacancy, $form)
    {
        return $this->render('v2/pages/vacancy.html.twig', [
            'page' => $vacancy,
            'form' => $form->createView(),
            'availableSalons' => $this->availableSalons,
        ]);
    }
}
