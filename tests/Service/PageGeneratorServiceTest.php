<?php

namespace App\Tests\Service;

use App\Entity\PriceBrand;
use App\Entity\PriceCategory;
use App\Entity\PriceModel;
use App\Entity\PriceService;
use App\Entity\Service;
use App\Model\PageGeneratorModel;
use App\Repository\PriceBrandRepository;
use App\Repository\PriceModelRepository;
use App\Repository\PriceServiceRepository;
use App\Repository\ServiceRepository;
use App\Service\PageGeneratorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageGeneratorServiceTest extends WebTestCase
{
    
    private $page_generator_service;
    private $price_brand_repository;
    private $price_model_repository;
    private $price_service_repository;
    private $service_repository;
    private $em;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->page_generator_service   = self::$container->get(PageGeneratorService::class);
        $this->price_brand_repository   = self::$container->get(PriceBrandRepository::class);
        $this->price_model_repository   = self::$container->get(PriceModelRepository::class);
        $this->price_service_repository = self::$container->get(PriceServiceRepository::class);
        $this->service_repository       = self::$container->get(ServiceRepository::class);
        $this->em                       = self::$container->get(EntityManagerInterface::class);
    }
    
    public function testGenerateByNewBrand()
    {
        $price_brand = $this->price_brand_repository->find(1);
        $this->page_generator_service->generateByNewBrand($price_brand);
        /*Проверяем добавленные страницы*/
        $pages = $this->service_repository->findAll();
        $this->assertCount(298, $pages);
    }
    
    public function testGenerateByNewModel()
    {
        $price_model = $this->price_model_repository->find(1);
        $this->page_generator_service->generateByNewModel($price_model);
        /*Проверяем добавленные страницы*/
        $pages = $this->service_repository->findAll();
        $this->assertCount(298, $pages);
    }
    
    public function testGenerateByNewService()
    {
        $price_service = $this->price_service_repository->find(1);
        $this->page_generator_service->generateByNewService($price_service);
        /*Проверяем добавленные страницы*/
        $pages = $this->service_repository->findAll();
        $this->assertCount(1065, $pages);
    }
    
    public function testGenerateByNewBrandListener()
    {
        $price_brand = new PriceBrand();
        $price_brand->setName('Test')
                    ->setCode('test')
                    ->setNameRus('Тест')
                    ->setClass(1)
                    ->setIncrease(0)
                    ->setPosition(0);
        $this->em->persist($price_brand);
        $this->em->flush();
        /*Проверяем добавленные страницы*/
        $pages = $this->service_repository->findAll();
        $this->assertCount(298, $pages);
    }
    
    public function testGenerateByNewModelListener()
    {
        $price_brand = $this->createTestBrand();
        
        $pages = $this->service_repository->findAll();
        $this->assertCount(298, $pages);
        
        $this->createTestModel($price_brand);
        
        /*Проверяем добавленные страницы*/
        $pages = $this->service_repository->findAll();
        $this->assertCount(298 * 2, $pages);
    }
    
    public function testGenerateByNewServiceListener()
    {
        $this->createTestService();
        
        /*Проверяем добавленные страницы*/
        $pages = $this->service_repository->findAll();
        $this->assertCount(1065, $pages);
    }
    
    public function testGenerateByPageGeneratorModel()
    {
        $price_brand                         = $this->createTestBrand();
        $price_model                         = $this->createTestModel($price_brand);
        $service                             = $this->price_service_repository->find(1);
        $pageGeneratorModel                  = new PageGeneratorModel();
        $pageGeneratorModel->brands[]        = $price_brand;
        $pageGeneratorModel->models[]        = $price_model;
        $pageGeneratorModel->service         = $service;
        $pageGeneratorModel->h1              = 'SERVICE BRAND MODEL в H1';
        $pageGeneratorModel->metaDescription = 'SERVICE BRAND MODEL в описании BRAND';
        $pageGeneratorModel->text            = 'SERVICE BRAND MODEL в тексте BRAND';
        $counter                             = $this->page_generator_service->generateByPageGeneratorModel($pageGeneratorModel);
        $this->assertSame(2, $counter);
        $pages              = $pageGeneratorModel->getMatchedPages();
        $brand_service_page = $pages[0];
        $this->assertInstanceOf(Service::class, $brand_service_page);
        $this->assertSame('Полная покраска Test Brand (Тест марка) в H1', $brand_service_page->getH1());
        $this->assertSame('Полная покраска Test Brand (Тест марка) в описании Test Brand',
            $brand_service_page->getMetaDescription());
        $this->assertSame('Полная покраска Test Brand (Тест марка) в тексте Test Brand',
            $brand_service_page->getText());
        $model_service_page = $pages[1];
        $this->assertInstanceOf(Service::class, $model_service_page);
        $this->assertSame('Полная покраска Test Brand Test model (Тест марка Тест модель) в H1',
            $model_service_page->getH1());
        $this->assertSame('Полная покраска Test Brand Test model (Тест марка Тест модель) в описании Test Brand',
            $model_service_page->getMetaDescription());
        $this->assertSame('Полная покраска Test Brand Test model (Тест марка Тест модель) в тексте Test Brand',
            $model_service_page->getText());
    }
    
    private function createTestBrand(): PriceBrand
    {
        $price_brand = new PriceBrand();
        $price_brand->setName('Test Brand')
                    ->setCode('test-brand')
                    ->setNameRus('Тест марка')
                    ->setClass(1)
                    ->setIncrease(0)
                    ->setPosition(0);
        $this->em->persist($price_brand);
        $this->em->flush();
        
        return $price_brand;
    }
    
    private function createTestModel($price_brand): PriceModel
    {
        $price_model = new PriceModel();
        $price_model->setName('Test model')
                    ->setCode('test-model')
                    ->setNameRus('Тест модель')
                    ->setClass(1)
                    ->setPriceBrand($price_brand);
        $this->em->persist($price_model);
        $this->em->flush();
        
        return $price_model;
    }
    
    private function createTestService(): PriceService
    {
        $price_category = new PriceCategory();
        $price_category->setName('Тестовая категория');
        $this->em->persist($price_category);
        
        $price_service = new PriceService();
        $price_service->setName('Тестовый сервис')
                      ->setPriceCategory($price_category);
        $this->em->persist($price_service);
        $this->em->flush();
        
        return $price_service;
    }
}