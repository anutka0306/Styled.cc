<?php

namespace App\Tests\Service;

use App\Service\ConfigService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ConfigServiceTest extends KernelTestCase
{
    /**
     * @dataProvider paramProvider
     */
    public function testParamsAreSet($param)
    {
        self::bootKernel();
        $configs = self::$container->get(ConfigService::class);
        $this->assertNotEmpty($configs->get($param),"Config param $param is not set");
    }
    
    public function paramProvider()
    {
        yield ['mail.fromName'];
        yield ['mail.fromEmail'];
        yield ['mail.recipients'];
        yield ['mail.recipients_dev'];
    }
}
