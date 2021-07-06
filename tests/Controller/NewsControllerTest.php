<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewsControllerTest extends WebTestCase
{
    public function testIndexPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/news/');

        $this->assertResponseIsSuccessful();
        $this->assertCount(1, $crawler->filter('h1'));
    }
    public function testItemPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/news/1/');

        $this->assertResponseIsSuccessful();
        $this->assertCount(1, $crawler->filter('h1'));
    }
}
