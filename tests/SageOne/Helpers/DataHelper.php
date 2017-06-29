<?php

namespace DarrynTen\SageOne\Tests\SageOne\Helpers;

trait DataHelper
{
    /**
     * @return \Mockery\MockInterface|\DarrynTen\SageOne\Request\RequestHandler
     */
    public function getRequestMock()
    {
        return \Mockery::mock('DarrynTen\SageOne\Request\RequestHandler');
    }
}
