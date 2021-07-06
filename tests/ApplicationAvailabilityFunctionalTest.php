<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApplicationAvailabilityFunctionalTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
    
        $crawler = $client->request('GET', $url);
        if ($client->getResponse()->isRedirection()) {
            $client->followRedirect();
        }
        $this->assertEquals(200,$client->getResponse()->getStatusCode(),"Wrong url is $url");
        $this->assertCount(1, $crawler->filter('h1'),"H1 problem with $url");
    }
    
    public function testPageIsNotFound()
    {
        $client = self::createClient();
        $client->request('GET', '/abrakadabra/');
        
        $this->assertResponseStatusCodeSame(404);
    }
    
    public function testPageIsRedirect()
    {
        $client = self::createClient();
        $client->request('GET', '/admin/');
        
        $this->assertResponseRedirects('/login');
    }
    
    
    public function urlProvider()
    {
        yield ['/'];
        yield ['/uslugi/'];
        yield ['/price_list/'];
        yield ['/naschiraboty/'];
        yield ['/naschiraboty/16/'];
        yield ['/about_us/'];
        yield ['/contact_info/'];
        yield ['/paint/'];
        yield ['/uslugi/'];
        yield ['/news/'];
        yield ['/news/12/'];
        yield ['/reviews/'];
        yield ['/reviews/168/'];
        yield ['/faq/'];
        yield ['/faq/25/'];
        yield ['/acura/'];
        yield ['/acura/detejling/'];
        yield ['/acura/mdx/detejling/'];
        yield ['/acura/mdx/'];
    }
}