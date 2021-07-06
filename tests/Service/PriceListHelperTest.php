<?php

namespace App\Tests\Service;

use App\Repository\ContentRepository;
use App\Service\PriceListHelper;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PriceListHelperTest extends WebTestCase
{
    private $content_repository;
    private $price_list_helper;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->price_list_helper  = self::$container->get(PriceListHelper::class);
        $this->content_repository = self::$container->get(ContentRepository::class);
    }
    /**
     * @dataProvider detailingUrlProvider
     */
    public function testDetailingServicePage($path)
    {
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $is_detailing  = $this->price_list_helper->isDetailing($content);
        $this->assertTrue($is_detailing);
    }
    /**
     * @dataProvider repairUrlProvider
     */
    public function testNonDetailingServicePage($path)
    {
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $is_detailing  = $this->price_list_helper->isDetailing($content);
        $this->assertFalse($is_detailing);
    }
    /**
     * @dataProvider nonServiceUrlProvider
     */
    public function testNonServicePage($path)
    {
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $is_detailing  = $this->price_list_helper->isDetailing($content);
        $this->assertFalse($is_detailing);
    }
    /**
     * @dataProvider detailingUrlProvider
     */
    public function testDetailingRoot($path)
    {
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $root_category  = $this->price_list_helper->getRootCategory($content);
        $this->assertSame('Детейлинг',$root_category->getName());
    }
    /**
     * @dataProvider repairUrlProvider
     */
    public function testRepairRoot($path)
    {
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $root_category  = $this->price_list_helper->getRootCategory($content);
        $this->assertSame('Кузовные работы',$root_category->getName(),'Wrong: '.$path);
    }
    /**
     * @dataProvider nonServiceUrlProvider
     */
    public function testNonServiceRoot($path)
    {
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $root_category  = $this->price_list_helper->getRootCategory($content);
        $this->assertNull($root_category);
    }
    /**
     * @dataProvider priceUrlProvider
     */
    public function testGetPrice($path,$price)
    {
        $content = $this->content_repository->findOneBy(['path' => $path]);
        $calculated_price  = $this->price_list_helper->getPrice($content);
        $this->assertSame($price,$calculated_price,'Wrong: '.$path);
    }
    
    public function detailingUrlProvider()
    {
        yield ['/acura/mdx/detejling/'];
        yield ['/acura/mdx/zashchita-kuzova-ot-carapin/'];
        yield ['/acura/zashchita-kuzova-ot-carapin/'];
        yield ['/detailing/'];
    }
    
    public function repairUrlProvider()
    {
        yield ['/acura/mdx/lokalnyy-remont-kuzova/'];
        yield ['/local_body_repair/'];
    }
    
    public function nonServiceUrlProvider()
    {
        yield ['/uslugi/'];
        yield ['/naschiraboty/'];
        yield ['/about_us/'];
    }
    
    public function priceUrlProvider()
    {
        yield ['/jeep/remont-i-ustanovka-avtostekol/',3960];
        yield ['/acura/remont-i-zamena-kapota/',2010];
        yield ['/acura/zashchita-kuzova-ot-carapin/',3260];
        yield ['/chevrolet/zashchita-kuzova-ot-carapin/',2900];
        yield ['/bmw/antikorroziynaya-obrabotka/',6360];
        yield ['/acura/antikorroziynaya-obrabotka/',6380];
        yield ['/jeep/commander/detejling/',1260];
        yield ['/',null];
        yield ['/jeep/commander/',null];
    }
}