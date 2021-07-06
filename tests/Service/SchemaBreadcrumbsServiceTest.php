<?php

namespace App\Tests\Service;

use App\Repository\ContentRepository;
use App\Service\BrandResolverService;
use App\Service\SchemaBreadcrumbsService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SchemaBreadcrumbsServiceTest extends WebTestCase
{
    /** @var SchemaBreadcrumbsService */
    private $schema_breadcrumbs_service;
    
    /** @var ContentRepository */
    private $content_repository;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->schema_breadcrumbs_service = self::$container->get(SchemaBreadcrumbsService::class);
        $this->content_repository         = self::$container->get(ContentRepository::class);
    }
    
    public function testModelServicePage()
    {
        $path    = '/acura/mdx/lokalnyy-remont-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $schema  = $this->schema_breadcrumbs_service->getSchema($content);
        $this->assertNotNull($schema);
        $this->assertIsArray($schema);
        $this->assertArrayHasKey('itemListElement', $schema);
        $this->assertCount(4, $schema['itemListElement']);
        $this->assertEquals('📍 ДетейлингофЪ', $schema['itemListElement'][0]['item']['name']);
        $this->assertEquals('⭐ Кузовной ремонт Acura', $schema['itemListElement'][1]['item']['name']);
        $this->assertEquals('✅ Mdx', $schema['itemListElement'][2]['item']['name']);
        $this->assertEquals('⭐ Локальный ремонт кузова', $schema['itemListElement'][3]['item']['name']);
    }
    
    public function testBrandServicePage()
    {
        $path    = '/acura/lokalnyy-remont-kuzova/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $schema  = $this->schema_breadcrumbs_service->getSchema($content);
        $this->assertNotNull($schema);
        $this->assertIsArray($schema);
        $this->assertArrayHasKey('itemListElement', $schema);
        $this->assertCount(3, $schema['itemListElement']);
        $this->assertEquals('📍 ДетейлингофЪ', $schema['itemListElement'][0]['item']['name']);
        $this->assertEquals('⭐ Кузовной ремонт Acura', $schema['itemListElement'][1]['item']['name']);
        $this->assertEquals('✅ Локальный ремонт кузова', $schema['itemListElement'][2]['item']['name']);
    }
    
    public function testBrandPage()
    {
        $path    = '/acura/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $schema  = $this->schema_breadcrumbs_service->getSchema($content);
        $this->assertNotNull($schema);
        $this->assertIsArray($schema);
        $this->assertArrayHasKey('itemListElement', $schema);
        $this->assertCount(2, $schema['itemListElement']);
        $this->assertEquals('📍 ДетейлингофЪ', $schema['itemListElement'][0]['item']['name']);
        $this->assertEquals('⭐ Кузовной ремонт Acura', $schema['itemListElement'][1]['item']['name']);
    }
    
    public function testModelPage()
    {
        $path    = '/acura/mdx/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $schema  = $this->schema_breadcrumbs_service->getSchema($content);
        $this->assertNotNull($schema);
        $this->assertIsArray($schema);
        $this->assertArrayHasKey('itemListElement', $schema);
        $this->assertCount(3, $schema['itemListElement']);
        $this->assertEquals('📍 ДетейлингофЪ', $schema['itemListElement'][0]['item']['name']);
        $this->assertEquals('⭐ Кузовной ремонт Acura', $schema['itemListElement'][1]['item']['name']);
        $this->assertEquals('✅ Mdx', $schema['itemListElement'][2]['item']['name']);
    }
    
    public function testWrongPage()
    {
        $path    = '/price_list/';
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $schema  = $this->schema_breadcrumbs_service->getSchema($content);
        $this->assertNull($schema);
    }
}