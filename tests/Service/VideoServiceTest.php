<?php

namespace App\Tests\Service;

use App\Entity\Video;
use App\Repository\ContentRepository;
use App\Service\VideoService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VideoServiceTest extends WebTestCase
{
    private $content_repository;
    private $before_after_service;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->before_after_service = self::$container->get(VideoService::class);
        $this->content_repository   = self::$container->get(ContentRepository::class);
    }
    
    public function testModelServicePageAlgorithm1()
    {
        /*Есть видео данной услуги для данной модели*/
        $path    = '/land-rover/range-rover/ustanovka-avtostekol/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $item  = $this->before_after_service->getItems($content);
        $this->assertNotNull($item);
        $this->assertInstanceOf(Video::class,$item);
        $this->assertEquals('Замена стекла Range Rover Evoque', $item->getName());
    }
    
    public function testModelServicePageAlgorithm2()
    {
        /*Есть видео данной услуги, но для другой модели данной марки*/
        $path    = '/land-rover/discovery/ustanovka-avtostekol/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $item  = $this->before_after_service->getItems($content);
        $this->assertNotNull($item);
        $this->assertInstanceOf(Video::class,$item);
        $this->assertEquals('Замена стекла Range Rover Evoque', $item->getName());
    }
    
    public function testModelServicePageAlgorithm3()
    {
        /*Есть видео данной услуги, но не для моделей данной марки*/
        $path    = '/acura/mdx/ustanovka-avtostekol/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $item  = $this->before_after_service->getItems($content);
        $this->assertNotNull($item);
        $this->assertInstanceOf(Video::class,$item);
        $this->assertEquals('Замена стекла Range Rover Evoque', $item->getName());
    }
    
    public function testModelServicePageAlgorithm4()
    {
        /*Нет видео данной услуги*/
        $path    = '/land-rover/range-rover/pokraska-bampera/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $item  = $this->before_after_service->getItems($content);
        $this->assertNull($item);
    }
    
    
    
    public function testBrandServicePageAlgorithm1()
    {
        /*Есть видео данной услуги для модели данной марки*/
        $path    = '/land-rover/ustanovka-avtostekol/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $item  = $this->before_after_service->getItems($content);
        $this->assertNotNull($item);
        $this->assertInstanceOf(Video::class,$item);
        $this->assertEquals('Замена стекла Range Rover Evoque', $item->getName());
    }
    
    public function testBrandServicePageAlgorithm3()
    {
        /*Есть фотогрфии данной услуги для модели другой марки*/
        $path    = '/acura/ustanovka-avtostekol/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $item  = $this->before_after_service->getItems($content);
        $this->assertNotNull($item);
        $this->assertInstanceOf(Video::class,$item);
        $this->assertEquals('Замена стекла Range Rover Evoque', $item->getName());
    }
    
    public function testBrandServicePageAlgorithm4()
    {
        /*Нет фотографий данной услуги*/
        $path    = '/acura/vosstanovlenie-geometrii-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $item  = $this->before_after_service->getItems($content);
        $this->assertNull($item);
    }
    
    public function testOtherPageAlgorithm4()
    {
        /*это не страница услуги*/
        $path    = '/bmw/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $item  = $this->before_after_service->getItems($content);
        $this->assertNull($item);
    }
}