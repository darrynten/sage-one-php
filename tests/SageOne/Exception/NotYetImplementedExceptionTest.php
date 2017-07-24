<?php

namespace DarrynTen\SageOne\Tests\SageOne;

use DarrynTen\SageOne\Exception\NotYetImplementedException;

class NotYetImplementedExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testMethodNotImplemented()
    {
        $this->expectException(NotYetImplementedException::class);
        $this->expectExceptionMessage('Error, "/path/to/method:here()" Method not yet implemented. This still needs to be added, please consider contributing to the project.');
        $this->expectExceptionCode(10301);

        throw new NotYetImplementedException(10301, '/path/to/method:here()');
    }
}
