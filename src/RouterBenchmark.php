<?php
/**
 * Router Benchmark
 */
declare(strict_types = 1);

namespace Sunrise\Http\Router\Benchs;

use Psr\Http\Message\ServerRequestInterface;
use Sunrise\Http\ServerRequest\ServerRequestFactory;

use function floor;

class RouterBenchmark
{
    const VERSION = '0.2.0';

    /** @var int */
    protected $maxRoutes = 1000;

    /** @var ServerRequestInterface */
    protected $request;

    public function init()
    {
        $this->request = (new ServerRequestFactory)->createServerRequest(
            'GET',
            '/route/' . floor($this->maxRoutes / 2)
        );
    }
}
