<?php

namespace App\Tests\Service;

use App\Repository\ContentRepository;
use App\Service\OurWorksService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OurWorksServiceTest extends WebTestCase
{
    private $content_repository;
    private $our_works_service;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->our_works_service  = self::$container->get(OurWorksService::class);
        $this->content_repository = self::$container->get(ContentRepository::class);
    }
    
    public function testModelServicePageAlgorithm1()
    {
        /*Есть фотографии данной услуги для данной модели*/
        $path    = '/lada/kalina/polirovka-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $folder  = $this->our_works_service->getFolder($content);
        $this->assertNotEmpty($folder);
        $this->assertIsString($folder);
        $this->assertEquals('img/our-works/1', $folder);
    }
    
    public function testModelServicePageAlgorithm2()
    {
        /*Есть фотографии данной услуги, но для другой модели данной марки*/
        $path    = '/lada/xray/polirovka-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $folder  = $this->our_works_service->getFolder($content);
        $this->assertNotEmpty($folder);
        $this->assertIsString($folder);
        $this->assertEquals('img/our-works/1', $folder);
    }
    
    public function testModelServicePageAlgorithm3()
    {
        /*Есть фотографии данной услуги, но не для моделей данной марки*/
        $path    = '/acura/mdx/polirovka-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $folder  = $this->our_works_service->getFolder($content);
        $this->assertNotEmpty($folder);
        $this->assertIsString($folder);
        $this->assertEquals('img/our-works/1', $folder);
    }
    
    public function testModelServicePageAlgorithm4()
    {
        /*Нет фотографий данной услуги*/
        $path    = '/acura/mdx/vosstanovlenie-geometrii-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $folder  = $this->our_works_service->getFolder($content);
        $this->assertNotEmpty($folder);
        $this->assertIsString($folder);
        $this->assertEquals('img/our-works/2', $folder);
    }
    
    
    
    public function testBrandServicePageAlgorithm1()
    {
        /*Есть фотографии данной услуги для модели данной марки*/
        $path    = '/lada/polirovka-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $folder  = $this->our_works_service->getFolder($content);
        $this->assertNotEmpty($folder);
        $this->assertIsString($folder);
        $this->assertEquals('img/our-works/1', $folder);
    }
    
    public function testBrandServicePageAlgorithm3()
    {
        /*Есть фотографии данной услуги для модели другой марки*/
        $path    = '/acura/polirovka-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $folder  = $this->our_works_service->getFolder($content);
        $this->assertNotEmpty($folder);
        $this->assertIsString($folder);
        $this->assertEquals('img/our-works/1', $folder);
    }
    
    public function testBrandServicePageAlgorithm4()
    {
        /*Нет фотографий данной услуги*/
        $path    = '/acura/vosstanovlenie-geometrii-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $folder  = $this->our_works_service->getFolder($content);$this->assertNotEmpty($folder);
        $this->assertIsString($folder);
        $this->assertEquals('img/our-works/2', $folder);
    }
    
    public function testOtherPageAlgorithm4()
    {
        /*это не страница услуги*/
        $path    = '/bmw/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $folder  = $this->our_works_service->getFolder($content);
        $this->assertNotEmpty($folder);
        $this->assertIsString($folder);
        $this->assertEquals('img/our-works/2', $folder);
    }
}