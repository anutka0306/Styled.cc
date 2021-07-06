<?php

namespace App\Tests\Service;

use App\Dto\BreadcrumbsItemDTO;
use App\Repository\ContentRepository;
use App\Service\BreadcrumbsService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BreadcrumbsServiceTest extends WebTestCase
{
    private $content_repository;
    private $breadcrumbs_service;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->breadcrumbs_service = self::$container->get(BreadcrumbsService::class);
        $this->content_repository  = self::$container->get(ContentRepository::class);
    }
    
    public function testModelServicePage()
    {
        $path    = '/acura/mdx/lokalnyy-remont-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->breadcrumbs_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(4, $items);
        $this->assertInstanceOf(BreadcrumbsItemDTO::class,$items[0]);
        $this->assertEquals('Кузовной ремонт', $items[0]->name);
        $this->assertEquals('Acura (Акура)', $items[1]->name);
        $this->assertEquals('Acura Mdx (Акура МДХ)', $items[2]->name);
        $this->assertEquals('Локальный ремонт кузова', $items[3]->name);
    }
    
    public function testBrandServicePage()
    {
        $path    = '/acura/lokalnyy-remont-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->breadcrumbs_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(3, $items);
        $this->assertInstanceOf(BreadcrumbsItemDTO::class,$items[0]);
        $this->assertEquals('Кузовной ремонт', $items[0]->name);
        $this->assertEquals('Acura (Акура)', $items[1]->name);
        $this->assertEquals('Локальный ремонт кузова', $items[2]->name);
    }
    
    public function testBrandPage()
    {
        $path    = '/acura/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->breadcrumbs_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(2, $items);
        $this->assertInstanceOf(BreadcrumbsItemDTO::class,$items[0]);
        $this->assertEquals('Кузовной ремонт', $items[0]->name);
        $this->assertEquals('Acura (Акура)', $items[1]->name);
    }
    
    public function testModelPage()
    {
        $path    = '/acura/mdx/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->breadcrumbs_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(3, $items);
        $this->assertInstanceOf(BreadcrumbsItemDTO::class,$items[0]);
        $this->assertEquals('Кузовной ремонт', $items[0]->name);
        $this->assertEquals('Acura (Акура)', $items[1]->name);
        $this->assertEquals('Acura Mdx (Акура МДХ)', $items[2]->name);
    }
    
    public function testOurWorksPage()
    {
        $path    = '/naschiraboty/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->breadcrumbs_service->getItems($content,'Раритетный Bentley Arnage');
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(3, $items);
        $this->assertInstanceOf(BreadcrumbsItemDTO::class,$items[0]);
        $this->assertEquals('Кузовной ремонт', $items[0]->name);
        $this->assertEquals('Наши работы', $items[1]->name);
        $this->assertEquals('Раритетный Bentley Arnage', $items[2]->name);
    }
    
    public function testReviewPage()
    {
        $path    = '/reviews/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->breadcrumbs_service->getItems($content,'Отзыв от 08.08.2018');
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(3, $items);
        $this->assertInstanceOf(BreadcrumbsItemDTO::class,$items[0]);
        $this->assertEquals('Кузовной ремонт', $items[0]->name);
        $this->assertEquals('Отзывы о «ДетейлингофЪ»', $items[1]->name);
        $this->assertEquals('Отзыв от 08.08.2018', $items[2]->name);
    }
    
    public function testFaqPage()
    {
        $path    = '/faq/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->breadcrumbs_service->getItems($content,'Окраска молдингов');
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(3, $items);
        $this->assertInstanceOf(BreadcrumbsItemDTO::class,$items[0]);
        $this->assertEquals('Кузовной ремонт', $items[0]->name);
        $this->assertEquals('Вопрос – ответ', $items[1]->name);
        $this->assertEquals('Окраска молдингов', $items[2]->name);
    }
    
}