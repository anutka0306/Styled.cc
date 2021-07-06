<?php

namespace App\Tests\Controller\Mail;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CallbackControllerTest extends WebTestCase
{
    public function testSuccessDevEmailSend()
    {
        $client = static::createClient();
        $subject = 'Запись на сервис в техцентр «ДетейлингофЪ»';
        $phone   = '+7(111)111-11-11';
        $location   = 'sev';
        $crawler = $client->request('POST', '/mail/callback/consultation',
            ['location' => $location, 'phone' => $phone, 'subject' => $subject],
            [],
            ['HTTP_REFERER' => '/',]
        );
        $content = $client->getResponse()->getContent();
        $this->assertJson($content);
        $response = json_decode($content);
        $this->assertTrue($response->status);
        $this->assertEquals("Спасибо, отправлено!",$response->msg);
    
        $this->assertEmailCount(1);
    
        $email = $this->getMailerMessage(0);
        $this->assertEmailHeaderSame($email, 'To', 'clients@qmotors.ru');
        $this->assertEmailTextBodyContains($email, 'Запись на сервис в техцентр «ДетейлингофЪ»');
    }
    
    public function testSuccessAllEmailSend()
    {
        $client = static::createClient();
        $subject = 'Запись на сервис в техцентр «ДетейлингофЪ»';
        $phone   = '+7(918)111-11-11';
        $location   = 'sev';
        $crawler = $client->request('POST', '/mail/callback/consultation',
            ['location' => $location, 'phone' => $phone, 'subject' => $subject],
            [],
            ['HTTP_REFERER' => '/',]
        );
        $content = $client->getResponse()->getContent();
        $this->assertJson($content);
        $response = json_decode($content);
    
        $this->assertTrue($response->status);
        $this->assertEquals("Спасибо, отправлено!",$response->msg);
    
        $this->assertEmailCount(1);
    
        $email = $this->getMailerMessage(0);
        $this->assertEmailHeaderSame($email, 'To', 'clients@qmotors.ru');
        $this->assertEmailTextBodyContains($email, 'Запись на сервис в техцентр «ДетейлингофЪ»');
    }
    
    public function testEmptyPhone()
    {
        $client = static::createClient();
        $subject = 'Заказ звонка';
        $phone   = '';
        $location   = 'sev';
        $crawler = $client->request('POST', '/mail/callback/consultation',
            ['location' => $location, 'phone' => $phone, 'subject' => $subject],
            [],
            ['HTTP_REFERER' => '/',]
        );
        $content = $client->getResponse()->getContent();
        $this->assertJson($content);
        $response = json_decode($content);
        $this->assertEquals(400,$response->status);
        
        $this->assertStringContainsString("Укажите телефон",$response->detail);
    
        $this->assertEmailCount(0);
    }
    
    /**
     * @dataProvider urlWrongPhoneProvider
     */
    public function testWrongPhone($phone)
    {
        $client = static::createClient();
        $subject = 'Заказ звонка';
        $location   = 'sev';
        $crawler = $client->request('POST', '/mail/callback/consultation',
            ['location' => $location, 'phone' => $phone, 'subject' => $subject],
            [],
            ['HTTP_REFERER' => '/',]
        );
        $content = $client->getResponse()->getContent();
        $this->assertJson($content);
        $response = json_decode($content);
        $this->assertEquals(400,$response->status);
        
        $this->assertStringContainsString("Укажите корректный телефон",$response->detail);
    
        $this->assertEmailCount(0);
    }
    
    public function urlWrongPhoneProvider()
    {
        yield ['79181111111'];
        yield ['7918111111'];
        yield ['+79181111111'];
        yield ['alpha'];
        yield ['111111111'];
    }
}