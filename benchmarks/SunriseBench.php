<?php

namespace Sunrise\Http\Router\Benchs;

use Sunrise\Http\Router\RouteCollection;
use Sunrise\Http\Router\Router;
use Sunrise\Http\ServerRequest\ServerRequestFactory;

/**
 * @BeforeMethods({"init"})
 */
class SunriseBench
{
	protected $maxRoutes = 1000;
	protected $request;

	public function init()
	{
		$uri = \sprintf('/route/%d', \floor($this->maxRoutes / 2));

		$this->request = (new ServerRequestFactory)
		->createServerRequest('GET', $uri);
	}

	/**
	 * @Warmup(1)
	 * @Iterations(1000)
	 */
	public function benchSunriseMatch()
	{
		$routes = new RouteCollection();

		for ($i = 1; $i <= $this->maxRoutes; $i++)
		{
			$routes->get("route:{$i}", "/route/{$i}");
		}

		$router = new Router();
		$router->addRoutes($routes);

		$router->match($this->request);
	}
}
