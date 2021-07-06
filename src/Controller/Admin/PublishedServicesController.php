<?php

namespace App\Controller\Admin;

use App\Model\PriceListModel;
use App\Repository\PriceCategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Service\FileManager;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/admin/published-services", name="admin_published_services_")
 */
class PublishedServicesController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var PriceListModel
     */
    protected $model;

    /**
     * @var PriceCategoryRepository
     */
    protected $priceCategoryRepository;

    /**
     * @var BrandRepository
     */
    protected $brandRepository;

    /**
     * @var ModelRepository
     */
    protected $modelRepository;
    
    public function __construct(
        EntityManagerInterface $em,
        PriceListModel $model,
        PriceCategoryRepository $priceCategoryRepository,
        BrandRepository $brandRepository,
        ModelRepository $modelRepository
    ) {
        $this->em = $em;
        $this->model = $model;
        $this->priceCategoryRepository = $priceCategoryRepository;
        $this->brandRepository = $brandRepository;
        $this->modelRepository = $modelRepository;
    }

    /**
     * @Route("/", name="index")
     */
    public function index() {
        
		$brands = $this->brandRepository->findAll();
        $priceCategories = $this->priceCategoryRepository->findAll();

        return $this->render('admin/published_services/index.html.twig', compact('priceCategories', 'brands'));
    }
    /**
     * @Route("/common-services/", name="common")
     */
    public function commonServices() {
        $sections = $this->model->getAllSections();
        return $this->render('admin/published_services/common_services.html.twig', compact('sections'));
    }

    /**
     * @Route("/list-whithout-text/", name="list_whithout_text")
     */
    public function listWhithoutText(FileManager $fileManager) {
        $pathToFile = '/files/services-whithout-text.txt';
        $description = 'Список страниц опубликованных без текста';

        $queryServices = $this->em->createQuery("SELECT a.h1 FROM App\Entity\Service as a WHERE a.published = 1 AND a.text = '' ORDER BY a.h1");
        $queryRootServices = $this->em->createQuery("SELECT a.h1 FROM App\Entity\RootService as a WHERE a.published = 1 AND a.text = '' ORDER BY a.h1");
        
        $content = $this->renderList($queryServices, $queryRootServices);
        $fileManager->upload($pathToFile, $content);
        return $this->render('admin/published_services/list.html.twig', compact('pathToFile', 'description'));
    }
    /**
     * @Route("/list-unpublished", name="list_unpublished")
     */
    public function listUnpublished(FileManager $fileManager) {
        $pathToFile = '/files/services-unpublished.txt';
        $description = 'Список созданных, но не опубликованных страниц без текста';

        $queryServices = $this->em->createQuery("SELECT a.h1 FROM App\Entity\Service as a WHERE a.published = 0 AND a.text = '' ORDER BY a.h1");
        $queryRootServices = $this->em->createQuery("SELECT a.h1 FROM App\Entity\RootService as a WHERE a.published = 0 AND a.text = '' ORDER BY a.h1");

        $content = $this->renderList($queryServices, $queryRootServices);

        $fileManager->upload($pathToFile, $content);
        return $this->render('admin/published_services/list.html.twig', compact('pathToFile', 'description'));
    }

    /**
     * @Route("/{token}", name="dynamic_pages",requirements={"token"= ".+\/$"})
     */
    public function brand($token) {
        $brand = $this->brandRepository->findOneBy(['path' => "/".$token]);
        $models = $this->modelRepository->findBy(['parent' => $brand]);
        $priceCategories = $this->priceCategoryRepository->findAll();
        return $this->render('admin/published_services/brand.html.twig', compact('priceCategories', 'models', 'brand'));
    }

    private function renderList($queryServices, $queryRootServices)
    {
        $listServices = $queryServices->getResult();
        $listRootServices = $queryRootServices->getResult();
        $list = array_merge($listRootServices, $listServices);

        $formattedList = array_map(function($elem) {
                return $elem['h1'];
            }, $list);

        return implode("\r\n", $formattedList);
    }
}
