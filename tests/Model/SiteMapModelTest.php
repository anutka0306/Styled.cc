<?php

namespace App\Tests\Model;

use App\Dto\PageDto;
use App\Model\SiteMapModel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SiteMapModelTest extends KernelTestCase
{
    /** @var SiteMapModel*/
    private $model;
    
    public function setUp():void
    {
        self::bootKernel();
        $this->model = self::$container->get(SiteMapModel::class);
    }
    
    public function testGetPages()
    {
        $pages = $this->model->getPagesBatches();
        $this->assertNotEmpty($pages);
        $this->assertIsArray($pages);
        $this->assertEquals(2,count($pages));
        $this->assertNotEmpty($pages['sitemap1.xml']);
        $this->assertNotEmpty($pages['sitemap2.xml']);
        $this->assertIsArray($pages['sitemap1.xml']);
        $this->assertIsArray($pages['sitemap2.xml']);
        $this->assertEquals(50000,count($pages['sitemap1.xml']));
        $this->assertGreaterThan(1000,count($pages['sitemap2.xml']));
        $this->assertInstanceOf(PageDto::class,$pages['sitemap1.xml'][0]);
        $this->assertNotEmpty($pages['sitemap1.xml'][0]->path);
        $this->assertNotEmpty($pages['sitemap1.xml'][0]->modifyDate);
    }
    
}