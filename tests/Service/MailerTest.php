<?php

namespace App\Tests\Service;

use App\Request\CallbackFormRequest;
use App\Service\ConfigService;
use App\Service\Mailer;
use App\Service\RecipientResolverService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class MailerTest extends TestCase
{
    public function testSendConsultationMessage()
    {
        $fromEmail = 'from@test.ru';
        $fromName  = 'Tester';
        //Первые 2 элемента во вложенных массивах - это аргументы вызова метода get('mail.fromEmail',''). Третий - возвращаемое значение
        $config_data = [
            ['mail.fromEmail', '', $fromEmail],
            ['mail.fromName', '', $fromName],
        ];
        $phone       = '+7(111)111-11-11';
        $recipients  = ['to1@test.ru', 'to2@test.ru'];
        
        $symfonyMailer = $this->createMock(MailerInterface::class);
        //Утверждение, что метод send() будет вызван один раз
        $symfonyMailer->expects($this->once())
                      ->method('send');
        
        $config = $this->createMock(ConfigService::class);
        $config->expects($this->any())
               ->method('get')
               ->will($this->returnValueMap($config_data));
        
        $recipient_resolver = $this->createMock(RecipientResolverService::class);
        
        $recipient_resolver->expects($this->once())
                           ->method('getRecipients')
                           ->willReturn($recipients);
        $mailer         = new Mailer($symfonyMailer, $config, $recipient_resolver);
        $request        = $this->createMock(CallbackFormRequest::class);
        $request->phone = $phone;
        $request->subject = "Заказ обратного звонка";
        $email          = $mailer->sendConsultationMessage($request);
        $this->assertSame("Заказ обратного звонка", $email->getSubject());
        /** @var Address[] $from */
        $from = $email->getFrom();
        $this->assertInstanceOf(Address::class, $from[0]);
        $this->assertSame($fromName, $from[0]->getName());
        $this->assertSame($fromEmail, $from[0]->getAddress());
        
        $this->assertCount(count($recipients), $email->getTo());
        $to = $email->getTo();
        $this->assertInstanceOf(Address::class, $to[0]);
        $this->assertSame('', $to[0]->getName());
        $this->assertSame($recipients[0], $to[0]->getAddress());
    }
}
