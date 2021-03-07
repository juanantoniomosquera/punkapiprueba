<?php

namespace App\Tests\Servie\Punk;

use App\Service\Punk\Punk;
use PHPUnit\Framework\TestCase;
use App\Service\Util\Util;

class PunkTest extends TestCase
{
    public function testGetBeersByFood()
    {
        $punk = new Punk();
        $result = $punk->getBeersByFood('carne', ['description'], new Util());

        $this->assertNotEmpty($result);
    }
}
