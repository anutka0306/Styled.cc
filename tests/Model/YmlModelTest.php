<?php

namespace App\Tests\Model;

use App\Dto\YmlOfferDto;
use App\Model\YmlModel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class YmlModelTest extends KernelTestCase
{
    /** @var YmlModel*/
    private $model;
    
    public function setUp():void
    {
        self::bootKernel();
        $this->model = self::$container->get(YmlModel::class);
    }
    
    public function testGetOffers()
    {
        $offers = $this->model->getOffers();
        $this->assertNotEmpty($offers);
        $this->assertIsArray($offers);
        $this->assertGreaterThan(1000,count($offers));
        $this->assertInstanceOf(YmlOfferDto::class,$offers[0]);
        $this->assertNotEmpty($offers[0]->id);
        $this->assertNotEmpty($offers[0]->path);
        $this->assertNotEmpty($offers[0]->meta_title);
        $this->assertNotEmpty($offers[0]->meta_description);
        $this->assertGreaterThan(0,$offers[0]->price);
    }
    
    public function testGetMainPageData()
    {
        $main_page_data = $this->model->getMainPageData();
        $this->assertNotEmpty($main_page_data);
        $this->assertInstanceOf(\stdClass::class,$main_page_data);
        $this->assertNotEmpty($main_page_data->meta_title);
        $this->assertNotEmpty($main_page_data->meta_description);
    }
}