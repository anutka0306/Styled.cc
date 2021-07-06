<?php

namespace App\Controller\Admin;

use App\Repository\BrandRepository;
use App\Repository\ModelRepository;
use App\Repository\ServiceRepository;
use App\Repository\RootServiceRepository;
use App\Form\LocationManagerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LocationManagerController extends AbstractController
{
    /**
     * @var BrandRepository
     */
    protected $brand_repository;
    /**
     * @var ModelRepository
     */
    protected $model_repository;
    /**
     * @var ServiceRepository
     */
    protected $service_repository;
    /**
     * @var EntityManagerInterface
     */
    protected $em;
    /**
     * @var RootServiceRepository
     */
    protected $root_service_repository;

    public function __construct(
        BrandRepository $brand_repository,
        ModelRepository $model_repository,
        ServiceRepository $service_repository,
        RootServiceRepository $root_service_repository,
        EntityManagerInterface $em
    ) {
        $this->brand_repository         = $brand_repository;
        $this->model_repository         = $model_repository;
        $this->service_repository       = $service_repository;
        $this->root_service_repository  = $root_service_repository;
        $this->em                       = $em;
    }
    /**
     * @Route("/admin/location-manager", name="admin_location_manager")
     */
    public function index(Request $request)
    {
        $brands = $this->brand_repository->findAll();
        $isShowBrands = $this->isShow($brands);

        $models = $this->model_repository->findAll();
        $isShowModels = $this->isShow($models);

        $rootServices = $this->root_service_repository->findAll();
        $isShowRootServices = $this->isShow($rootServices);

        $services = $this->service_repository->findAll();

        $brandServices = array_filter($services, function ($service) {
                return null !== $service->getPriceBrand() && null ===$service->getPriceModel();
            });
        $isShowBrandServices = $this->isShow($brandServices);

        $modelServices = array_filter($services, function ($service) {
                return null !== $service->getPriceModel();
            });
        $isShowModelServices = $this->isShow($modelServices);

        $form = $this->createForm(
            LocationManagerType::class,
            null,
            ['isShowBrands' => $isShowBrands, 'isShowModels' => $isShowModels,'isShowBrandServices' => $isShowBrandServices, 'isShowModelServices' => $isShowModelServices, 'isShowRootServices' => $isShowRootServices]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if ($isShowBrands !== $data['showBrandLocation']) {
                foreach ($brands as $brand) {
                    $brand->setShowLocation($data['showBrandLocation']);
                }
            }

            if ($isShowModels !== $data['showModelLocation']) {
                foreach ($models as $model) {
                    $model->setShowLocation($data['showModelLocation']);
                }
            }

            if ($isShowModelServices !== $data['showModelServiceLocation']) {
                foreach ($modelServices as $modelService) {
                    $modelService->setShowLocation($data['showModelServiceLocation']);
                }
            }

            if ($isShowBrandServices !== $data['showBrandServiceLocation']) {
                foreach ($brandServices as $brandService) {
                    $brandService->setShowLocation($data['showBrandServiceLocation']);
                }
            }

            if ($isShowRootServices !== $data['showRootServiceLocation']) {
                foreach ($rootServices as $rootService) {
                    $rootService->setShowLocation($data['showRootServiceLocation']);
                }
            }

            $this->em->flush();
        }
        return $this->render('admin/location_manager/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    private function isShow($pages)
    {
        $showLocations = array_values(array_unique(array_map(function ($page) {
            return $page->getShowLocation();
        }, $pages)));
        if (count($showLocations) === 1) {
            [$isShowPages] = $showLocations;
        } else {
            $isShowPages = false;
            $this->addFlash(
                'warning',
                'Локации страниц включены частично'
            );
        }
        return $isShowPages;
    }
}
