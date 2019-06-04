<?php

namespace Sunrise\Http\Router\Benchs;

use Attogram\Router\Router;
use Sunrise\Http\ServerRequest\ServerRequestFactory;

use function floor;
use function sprintf;

/**
 * @BeforeMethods({"init"})
 */
class AttogramBench
{
	protected $maxRoutes = 1000;
	protected $request;

	public function init()
	{
		$uri = sprintf('/route/%d', floor($this->maxRoutes / 2));

		$this->request = (new ServerRequestFactory)->createServerRequest('GET', $uri);
	}

	/**
	 * @Warmup(1)
	 * @Iterations(1000)
	 */
	public function benchAttogramMatch()
	{
		$router = new Router;
		for ($i = 1; $i <= $this->maxRoutes; $i++)
		{
			$router->allow("/$i/", $i);
		}
		$match = $router->match();
	}
}
