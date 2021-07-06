<?php

namespace App\Tests\Service;

use App\Request\CallbackFormRequest;
use App\Service\ConfigService;
use App\Service\RecipientResolverService;
use PHPUnit\Framework\TestCase;

class RecipientResolverServiceTest extends TestCase
{
    /**
     * @dataProvider devPhoneProvider
     */
    public function testResolveDev($dev_phone)
    {
        $dev_recipients = 'dev1@test.ru,dev2@test.ru';
        $config         = $this->createMock(ConfigService::class);
        $config->expects($this->exactly(2))
               ->method('get')
               ->will($this->returnValue($dev_recipients));
        $recipients_resolver = new RecipientResolverService($config);
        $request        = $this->createMock(CallbackFormRequest::class);
        $request->phone = $dev_phone;
        $request->location = "sev";
        $this->assertSame(['dev1@test.ru', 'dev2@test.ru'], $recipients_resolver->getRecipients($request));
    }
    
    /**
     * @dataProvider phoneProvider
     */
    public function testResolveAll($phone)
    {
        $dev_recipients = 'dev1@test.ru,dev2@test.ru';
        $all_recipients = 'other1@test.ru,other2@test.ru';
        $extra_recipients = 'sev1@test.ru,sev2@test.ru';
        $config_data    = [
            ['mail.recipients_dev', '', $dev_recipients],
            ['mail.recipients', '', $all_recipients],
            ['mail.recipients.sev', '', $extra_recipients],
        ];
        $config         = $this->createMock(ConfigService::class);
        
        $config->expects($this->exactly(3))
               ->method('get')
               ->will($this->returnValueMap($config_data));
        $recipients_resolver = new RecipientResolverService($config);
        $request        = $this->createMock(CallbackFormRequest::class);
        $request->phone = $phone;
        $request->location = 'sev';
        $this->assertSame(
            ['dev1@test.ru', 'dev2@test.ru', 'other1@test.ru', 'other2@test.ru','sev1@test.ru','sev2@test.ru'],
            $recipients_resolver->getRecipients($request)
        );
    }
    
    public function devPhoneProvider()
    {
        yield ['71111111111'];
        yield ['+71111111111'];
        yield ['7(111)1111111'];
        yield ['7(111)111-11-11'];
        yield ['+7(111)111-1111'];
        yield ['+7 (111) 111-1111'];
    }
    
    public function phoneProvider()
    {
        yield ['712345678901'];
        yield ['+7(111)1111112'];
        yield ['7 (123)1111111'];
        yield ['7(111)123-11-11'];
        yield ['abrakadabra'];
        yield ['абракадабра'];
    }
}
