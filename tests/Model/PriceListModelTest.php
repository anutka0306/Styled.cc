<?php

namespace App\Tests\Model;

use App\Entity\PriceCategory;
use App\Entity\PriceService;
use App\Model\PriceListModel;
use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PriceListModelTest extends KernelTestCase
{
    /** @var PriceListModel*/
    private $model;
    /** @var ContentRepository*/
    private $content_repo;
    
    public function setUp():void
    {
        self::bootKernel();
        $this->model = self::$container->get(PriceListModel::class);
        $this->content_repo = self::$container->get(ContentRepository::class);
    }
    /**
     * @dataProvider correctTokenProvider
     */
    public function testGetServicesByBrandModelServicePage($token)
    {
        $page = $this->content_repo->findOneByToken($token);
        $section = $this->model->getSectionsByPage($page);
        $this->assertNotEmpty($section);
        $this->assertInstanceOf(PriceCategory::class,$section);
        $this->assertNotEmpty($section->getPriceServices());
        $services = $section->getPriceServices();
        $this->assertNotEmpty($services[0]);
        $service = $services[0];
        $this->assertInstanceOf(PriceService::class,$service);
        $this->assertNotEmpty($service->getPath());
        $this->assertNotEmpty($service->getPrice());
    }
    /**
     * @dataProvider incorrectTokenProvider
     */
    public function testGetServicesByNonServicePage($token)
    {
        $page = $this->content_repo->findOneByToken($token);
        $section = $this->model->getSectionsByPage($page);
        $this->assertNotEmpty($section);
        $this->assertInstanceOf(PriceCategory::class,$section);
        $this->assertNotEmpty($section->getPriceServices());
        $this->assertSame(13,$section->getId());
        $services = $section->getPriceServices();
        $this->assertNotEmpty($services[0]);
        $service = $services[0];
        $this->assertInstanceOf(PriceService::class,$service);
        $this->assertEmpty($service->getPath());
    }
    
    public function correctTokenProvider()
    {
        yield ['/acura/'];
        yield ['/acura/kuzovnoj-remont/'];
        yield ['/acura/remont-i-zamena-bampera/'];
        yield ['/acura/mdx/'];
        yield ['/acura/mdx/detejling/'];
    }
    
    public function incorrectTokenProvider()
    {
        yield ['/naschiraboty/'];
        yield ['/news/'];
        yield ['/faq/'];
        yield ['/'];
    }
}