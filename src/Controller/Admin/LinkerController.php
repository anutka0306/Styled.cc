<?php

namespace App\Controller\Admin;

use App\Repository\BrandRepository;
use App\Repository\ContentRepository;
use App\Repository\ModelRepository;
use App\Repository\ModelsCyrillicRepository;
use App\Repository\PriceBrandRepository;
use App\Repository\PriceCategoryRepository;
use App\Repository\PriceModelRepository;
use App\Repository\PriceServiceRepository;
use App\Repository\RootServiceRepository;
use App\Repository\ServiceRepository;
use App\Service\PageGeneratorService;
use App\Service\TranslateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class LinkerController extends AbstractController
{
    public function __construct(PageGeneratorService $page_generator_service)
    {
    }
    
    /**
     * @Route("/admin/linker/brands/", name="admin_linker_brands")
     */
    public function brands(BrandRepository $brand_repository, PriceBrandRepository $price_brand_repository)
    {
        $em      = $this->getDoctrine()->getManager();
        $brands  = $price_brand_repository->findAll();
        $counter = 0;
        foreach ($brands as $brand) {
            $page = $brand_repository->findOneByNameLike($brand->getName());
            if ($page) {
                $counter++;
                $page->setBrand($brand);
            }
        }
        $em->flush();
        
        return new Response($counter);
    }
    
    /**
     * @Route("/admin/linker/models/", name="admin_linker_models")
     */
    public function models(ModelRepository $model_repository, PriceModelRepository $price_model_repository)
    {
        $em      = $this->getDoctrine()->getManager();
        $models  = $price_model_repository->findAll();
        $counter = 0;
        foreach ($models as $model) {
            $page = $model_repository->findOneBy(['model_name' => $model->getName()]);
            if ($page) {
                $counter++;
                $page->setModel($model);
            }
        }
        $em->flush();
        
        return new Response($counter);
    }
    
    /**
     * @Route("/admin/linker/services/", name="admin_linker_services")
     */
    public function services(ServiceRepository $service_repository, PriceServiceRepository $price_services_repository)
    {
        ini_set('max_execution_time', 3600);
        $em       = $this->getDoctrine()->getManager();
        $services = $price_services_repository->findAll();
        $counter  = 0;
        foreach ($services as $service) {
            $pages = $service_repository->findBy(['name' => $service->getName(), 'service' => null]);
            if (count($pages)) {
                foreach ($pages as $page) {
                    $counter++;
                    $page->setService($service);
                }
                $em->flush();
            }
        }
        
        return new Response($counter);
    }
    
    /**
     * @Route("/admin/linker/categories/", name="admin_linker_categories")
     */
    public function categories(ServiceRepository $service_repository, PriceCategoryRepository $price_categories_repository)
    {
        ini_set('max_execution_time', 3600);
        $em       = $this->getDoctrine()->getManager();
        $counter  = 0;
        /*$categories = $price_categories_repository->findBy([],['id'=>'desc']);
        foreach ($categories as $category) {
            $pages = $service_repository->findBy(['kategoria' => $category->getName(), 'price_category' => null]);
            if (count($pages)) {
                foreach ($pages as $page) {
                    $counter++;
                    $page->setPriceCategory($category);
                }
                $em->flush();
            }
        }*/
        
        /*Линковка по сервису*/
        /*$pages = $service_repository->findBy(['price_category' => null]);
        foreach ($pages as $page) {
            if ($page->getService()) {
                $page->setPriceCategory($page->getService()->getPriceCategory());
                $counter++;
            }
        }
        $em->flush();*/
        /*Линковка по названию*/
        /*$categories = $price_categories_repository->findBy([],['id'=>'desc']);
        foreach ($categories as $category) {
            $pages = $service_repository->findBy(['name' => $category->getName(), 'price_category' => null]);
            if (count($pages)) {
                foreach ($pages as $page) {
                    $counter++;
                    $page->setPriceCategory($category);
                }
                $em->flush();
            }
        }*/
        $pages = $service_repository->findAll();
        
        foreach ($pages as $page) {
            if ($page->getService()) {
                $price_service_category = $page->getService()->getPriceCategory();
                if ($price_service_category->getId() !== $page->getPriceCategory()->getId()) {
                    $page->setPriceCategory($price_service_category);
                    $counter++;
                }
            }
        }
        $em->flush();
        return new Response('Затронуто страниц: '.$counter);
    }
    /**
     * @Route("/admin/linker/root-categories/", name="admin_linker_root_categories")
     */
    public function rootCategories(RootServiceRepository $service_repository, PriceCategoryRepository $price_categories_repository)
    {
        ini_set('max_execution_time', 3600);
        $em       = $this->getDoctrine()->getManager();
        $counter  = 0;
       /* $categories = $price_categories_repository->findBy([],['id'=>'desc']);
        foreach ($categories as $category) {
            $pages = $service_repository->findBy(['kategoria' => $category->getName(), 'price_category' => null]);
            if (count($pages)) {
                foreach ($pages as $page) {
                    $counter++;
                    $page->setPriceCategory($category);
                }
                $em->flush();
            }
        }*/
        
        /*Линковка по сервису*/
       /* $pages = $service_repository->findBy(['price_category' => null]);
        foreach ($pages as $page) {
            if ($page->getService()) {
                $page->setPriceCategory($page->getService()->getPriceCategory());
                $counter++;
            }
        }
        $em->flush();*/
        /*Линковка по названию*/
       /* $categories = $price_categories_repository->findBy([],['id'=>'desc']);
        foreach ($categories as $category) {
            $pages = $service_repository->findBy(['name' => $category->getName(), 'price_category' => null]);
            if (count($pages)) {
                foreach ($pages as $page) {
                    $counter++;
                    $page->setPriceCategory($category);
                }
                $em->flush();
            }
        }*/
        $pages = $service_repository->findAll();
        $categories = $price_categories_repository->findBy([],['id'=>'desc']);
        foreach ($pages as $page) {
            if ($page->getService()) {
                $price_service_category = $page->getService()->getPriceCategory();
                if ($price_service_category->getId() !== $page->getPriceCategory()->getId()) {
                    $page->setPriceCategory($price_service_category);
                    $counter++;
                    $em->flush();
                }
            }else{
                foreach ($categories as $category) {
                    if ($category->getName() === $page->getKategoria()) {
                        $page->setPriceCategory($category);
                        $counter++;
                        $em->flush();
                    }
                }
    
            }
        }
        return new Response($counter);
    }
    
    /**
     * @Route("/admin/linker/root-services/", name="admin_linker_rootservices")
     */
    public function rootservices(
        RootServiceRepository $service_repository,
        PriceServiceRepository $price_services_repository
    ) {
        $em       = $this->getDoctrine()->getManager();
        $services = $price_services_repository->findAll();
        $counter  = 0;
        foreach ($services as $service) {
            $page = $service_repository->findOneBy(['name' => $service->getName(), 'service' => null]);
            if ($page) {
                $counter++;
                $page->setService($service);
                
                $em->flush();
            }
        }
        
        return new Response($counter);
    }
    
    /**
     * @Route("/admin/linker/flat-categories/", name="admin_flat_categories")
     */
    public function admin_flat_categories(PriceCategoryRepository $price_category_repository) {
        $em       = $this->getDoctrine()->getManager();
        $categories = $price_category_repository->findRoots();
        $counter  = 0;
        foreach ($categories as $category) {
            foreach ($category->getChildren() as $child) {
                if ($child->getChildren()->count()) {
                    foreach ($child->getChildren() as $sub_child) {
                        if ($sub_child->getPriceServices()->count()) {
                            foreach ($sub_child->getPriceServices() as $price_service) {
                                $price_service->setPriceCategory($child);
                                $counter++;
                            }
                        }
                        $em->remove($sub_child);
                    }
                }
            }
        }
        $em->flush();
        return new Response($counter);
    }
    
    /**
     * @Route("/admin/linker/h1_from_title/", name="h1_from_title")
     */
    public function h1_from_title(ContentRepository $content_repository) {
        $em       = $this->getDoctrine()->getManager();
        $pages = $content_repository->findBy(['h1'=>null],['id'=>'asc'],15000);
        $counter  = 0;
        foreach ($pages as $page) {
            if (strpos($page->getMetaTitle(), ' - «ДетейлингофЪ»') !== false) {
                $page->setH1(str_replace(' - «ДетейлингофЪ»','',$page->getMetaTitle()));
                $counter++;
            }else{
                $page->setH1($page->getMetaTitle());
                $counter++;
            }
        }
        $em->flush();
        return new Response($counter);
    }
    
    /**
     * @Route("/admin/linker/brand_rus/", name="brand_rus")
     */
    public function brand_rus(PriceBrandRepository $price_brand_repository, ModelsCyrillicRepository $cyrillic_repository) {
        $em       = $this->getDoctrine()->getManager();
        $brands = $price_brand_repository->findBy(['nameRus'=>null]);
        $counter  = 0;
        foreach ($brands as $brand) {
            $rus = $cyrillic_repository->findOneBy(['nameEn'=>$brand->getName()]);
            if ( ! $rus) {
                throw new NotFoundHttpException('Не найден бренд '.$brand->getName());
            }
            $brand->setNameRus($rus->getNameRu());
            $brand->setCode($brand->getAlias());
            $counter++;
        }
        $em->flush();
        return new Response($counter);
    }
    
    /**
     * @Route("/admin/linker/model_rus/", name="model_rus")
     */
    public function model_rus(PriceModelRepository $price_model_repository, ModelsCyrillicRepository $cyrillic_repository) {
        $em       = $this->getDoctrine()->getManager();
        $models = $price_model_repository->findBy(['nameRus' =>null]);
        $counter  = 0;
        foreach ($models as $model) {
            $rus = $cyrillic_repository->findOneBy(['nameEn'=>$model->getName()]);
            if ( ! $rus) {
                if ((int)($model->getName() == $model->getName())) {
                    $model->setNameRus($model->getName());
                    continue;
                }
                throw new NotFoundHttpException('Не найдена модель '.$model->getName());
            }
            $model->setNameRus($rus->getNameRu());
            $counter++;
        }
        $em->flush();
        return new Response($counter);
    }
    /**
     * @Route("/admin/linker/doubles/", name="doubles")
     */
    public function doubles(ServiceRepository $service_repository) {
        $em       = $this->getDoctrine()->getManager();
        $old_new_map = [
            'remont-i-zamena-krila' => 'remont-i-zamena-kryla',
            'zacshita-kuzova-ot-carapin' => 'zashchita-kuzova-ot-carapin',
            'okleyka-zacshitnoy-plenkoy' => 'okleyka-zaschitnoy-plenkoy',
            'zacshita-kuzova-ot-skolov' => 'zashchita-kuzova-ot-skolov',
            'remont-i-ustanovka-avtostekol' => 'ustanovka-avtostekol',
        ];
        $counter  = 0;
        foreach ($old_new_map as $old_segment => $new_segment) {
            $old_pages = $service_repository->findByPathLike('%/'.$old_segment.'/');
            
            foreach ($old_pages as $old_page) {
                $new_path = str_replace($old_segment,$new_segment,$old_page->getPath());
                $new_page = $service_repository->findOneBy(['path'=>$new_path]);
                if ( ! $new_page) {
                    throw new NotFoundHttpException('Не найдена новая страница '.$new_path);
                }
                $new_page->setText($old_page->getText());
                $em->remove($old_page);
                $counter++;
            }
        }
        
        $em->flush();
        return new Response($counter);
    }
    /**
     * @Route("/admin/linker/service_slug/", name="service_slug")
     */
    public function service_slug(PriceServiceRepository $service_repository,TranslateService $translate_service) {
        $em       = $this->getDoctrine()->getManager();
        $services = $service_repository->findAll();
        $counter  = 0;
        foreach ($services as $service) {
            $slug = $translate_service->transliterate($service->getName());
            $service->setSlug($slug);
            $counter++;
        }
        
        $em->flush();
        return new Response($counter);
    }
}
