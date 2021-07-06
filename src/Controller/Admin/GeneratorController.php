<?php

namespace App\Controller\Admin;

use App\Entity\PriceCategory;
use App\Repository\ContentRepository;
use App\Repository\PriceCategoryRepository;
use App\Repository\PriceServiceRepository;
use App\Service\TranslateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/generator", name="admin_generator_")
 */
class GeneratorController extends AbstractController
{
    
    /**
     * @var ContentRepository
     */
    protected $content_repository;
    
    public function __construct(ContentRepository $content_repository)
    {
        $this->content_repository = $content_repository;
    }
    
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('admin/generator/index.html.twig');
    }
    
    /**
     * @Route("/rating/", name="rating")
     */
    public function rating(ContentRepository $content_repository)
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $content_repository->findAll();
        foreach ($pages as $page) {
            $page->setRatingValue($page->getRandomRatingValue());
            $page->setRatingCount($page->getRandomRatingCount());
        }
        $em->flush();
        
        $this->addFlash('success','Рейтинги перегенерированы для страниц: '.count($pages));
        return $this->redirectToRoute('admin_generator_index');
    }

    /**
     * @Route("/price-categoty-slug/", name="price-categoty-slug")
     */
    public function priceCategotySlug(PriceCategoryRepository $priceCategoryRepository, TranslateService $translateService)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $priceCategoryRepository->findAll();
        foreach ($categories as $category) {
            $category->setSlug($translateService->transliterate($category->getName()));
        }
        $em->flush();

        $this->addFlash('success','Алиасы перегенерированы для категорий: '.count($categories));
        return $this->redirectToRoute('admin_generator_index');
    }

    /**
     * @Route("/price-categoty-slug-from-service/", name="price-categoty-slug-from-service")
     */
    public function priceCategotySlugFromService(PriceServiceRepository $priceServiceRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $services = $priceServiceRepository->findAll();
        foreach ($services as $service) {
            /** @var PriceCategory $subCategory */
            $subCategory = $service->getPriceCategory();
            if ($subCategory->getName() === $service->getName()) {
                $subCategory->setSlug($service->getSlug());
                /** @var PriceCategory $category */
                $category = $subCategory->getParent();
                if ($category->getName() === $subCategory->getName()) {
                    $category->setSlug($service->getSlug());
                }
            }

        }
        $em->flush();

        $this->addFlash('success','Алиасы перегенерированы для категорий');
        return $this->redirectToRoute('admin_generator_index');
    }
}
