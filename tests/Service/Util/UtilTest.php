<?php

namespace App\Tests\Servie\Util;

use App\Service\Util\Util;
use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase
{
    public function testCallGet()
    {
        $util = new Util();
        $result = $util->callGet('https://api.punkapi.com/v2/beers/random');

        $this->assertNotEmpty($result);
    }
}
