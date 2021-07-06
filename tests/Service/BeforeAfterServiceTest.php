<?php

namespace App\Tests\Service;

use App\Entity\BeforeAfter;
use App\Repository\ContentRepository;
use App\Service\BeforeAfterService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BeforeAfterServiceTest extends WebTestCase
{
    private $content_repository;
    private $before_after_service;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->before_after_service = self::$container->get(BeforeAfterService::class);
        $this->content_repository   = self::$container->get(ContentRepository::class);
    }
    
    public function testModelServicePageAlgorithm1()
    {
        /*Есть фотографии данной услуги для данной модели*/
        $path    = '/bmw/3/pokraska-bampera/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->before_after_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(5, $items);
        $this->assertInstanceOf(BeforeAfter::class,$items[0]);
        $this->assertEquals('/img/before-after/bmw/3/3/before.jpg', $items[0]->getBeforeImg());
        $this->assertEquals('/img/before-after/hyundai/grand-starex/1/before.jpg', $items[1]->getBeforeImg());
        $this->assertEquals('/img/before-after/jaguar/xj/4/before.jpg', $items[2]->getBeforeImg());
        $this->assertEquals('/img/before-after/kia/cerato/5/before.jpg', $items[3]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/2/before.jpg', $items[4]->getBeforeImg());
    }
    
    public function testModelServicePageAlgorithm2()
    {
        /*Есть фотографии данной услуги, но для другой модели данной марки*/
        $path    = '/bmw/5/pokraska-bampera/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->before_after_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(5, $items);
        $this->assertInstanceOf(BeforeAfter::class,$items[0]);
        $this->assertEquals('/img/before-after/bmw/3/3/before.jpg', $items[0]->getBeforeImg());
        $this->assertEquals('/img/before-after/hyundai/grand-starex/1/before.jpg', $items[1]->getBeforeImg());
        $this->assertEquals('/img/before-after/jaguar/xj/4/before.jpg', $items[2]->getBeforeImg());
        $this->assertEquals('/img/before-after/kia/cerato/5/before.jpg', $items[3]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/2/before.jpg', $items[4]->getBeforeImg());
    }
    
    public function testModelServicePageAlgorithm3()
    {
        /*Есть фотографии данной услуги, но не для моделей данной марки*/
        $path    = '/acura/mdx/pokraska-bampera/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->before_after_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(5, $items);
        $this->assertInstanceOf(BeforeAfter::class,$items[0]);
        $this->assertEquals('/img/before-after/hyundai/grand-starex/1/before.jpg', $items[0]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/3/before.jpg', $items[1]->getBeforeImg());
        $this->assertEquals('/img/before-after/jaguar/xj/4/before.jpg', $items[2]->getBeforeImg());
        $this->assertEquals('/img/before-after/kia/cerato/5/before.jpg', $items[3]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/2/before.jpg', $items[4]->getBeforeImg());
    }
    
    public function testModelServicePageAlgorithm4()
    {
        /*Нет фотографий данной услуги*/
        $path    = '/acura/mdx/vosstanovlenie-geometrii-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->before_after_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(5, $items);
        $this->assertInstanceOf(BeforeAfter::class,$items[0]);
        $this->assertEquals('/img/before-after/hyundai/grand-starex/1/before.jpg', $items[0]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/2/before.jpg', $items[1]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/3/before.jpg', $items[2]->getBeforeImg());
        $this->assertEquals('/img/before-after/jaguar/xj/4/before.jpg', $items[3]->getBeforeImg());
        $this->assertEquals('/img/before-after/kia/cerato/5/before.jpg', $items[4]->getBeforeImg());
    }
    
    
    
    public function testBrandServicePageAlgorithm1()
    {
        /*Есть фотографии данной услуги для модели данной марки*/
        $path    = '/bmw/pokraska-bampera/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->before_after_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(5, $items);
        $this->assertInstanceOf(BeforeAfter::class,$items[0]);
        $this->assertEquals('/img/before-after/bmw/3/3/before.jpg', $items[0]->getBeforeImg());
        $this->assertEquals('/img/before-after/hyundai/grand-starex/1/before.jpg', $items[1]->getBeforeImg());
        $this->assertEquals('/img/before-after/jaguar/xj/4/before.jpg', $items[2]->getBeforeImg());
        $this->assertEquals('/img/before-after/kia/cerato/5/before.jpg', $items[3]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/2/before.jpg', $items[4]->getBeforeImg());
    }
    
    public function testBrandServicePageAlgorithm3()
    {
        /*Есть фотографии данной услуги для модели другой марки*/
        $path    = '/acura/pokraska-bampera/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->before_after_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(5, $items);
        $this->assertInstanceOf(BeforeAfter::class,$items[0]);
        $this->assertEquals('/img/before-after/hyundai/grand-starex/1/before.jpg', $items[0]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/3/before.jpg', $items[1]->getBeforeImg());
        $this->assertEquals('/img/before-after/jaguar/xj/4/before.jpg', $items[2]->getBeforeImg());
        $this->assertEquals('/img/before-after/kia/cerato/5/before.jpg', $items[3]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/2/before.jpg', $items[4]->getBeforeImg());
    }
    
    public function testBrandServicePageAlgorithm4()
    {
        /*Нет фотографий данной услуги*/
        $path    = '/acura/vosstanovlenie-geometrii-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->before_after_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(5, $items);
        $this->assertInstanceOf(BeforeAfter::class,$items[0]);
        $this->assertEquals('/img/before-after/hyundai/grand-starex/1/before.jpg', $items[0]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/2/before.jpg', $items[1]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/3/before.jpg', $items[2]->getBeforeImg());
        $this->assertEquals('/img/before-after/jaguar/xj/4/before.jpg', $items[3]->getBeforeImg());
        $this->assertEquals('/img/before-after/kia/cerato/5/before.jpg', $items[4]->getBeforeImg());
    }
    
    public function testOtherPageAlgorithm4()
    {
        /*это не страница услуги*/
        $path    = '/bmw/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $items  = $this->before_after_service->getItems($content);
        $this->assertNotNull($items);
        $this->assertIsArray($items);
        $this->assertCount(5, $items);
        $this->assertInstanceOf(BeforeAfter::class,$items[0]);
        $this->assertEquals('/img/before-after/hyundai/grand-starex/1/before.jpg', $items[0]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/2/before.jpg', $items[1]->getBeforeImg());
        $this->assertEquals('/img/before-after/bmw/3/3/before.jpg', $items[2]->getBeforeImg());
        $this->assertEquals('/img/before-after/jaguar/xj/4/before.jpg', $items[3]->getBeforeImg());
        $this->assertEquals('/img/before-after/kia/cerato/5/before.jpg', $items[4]->getBeforeImg());
    }
}