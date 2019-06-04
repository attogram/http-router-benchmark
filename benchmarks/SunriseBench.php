<?php
/**
 * Router Benchmark
 * Sunrise Router
 */
declare(strict_types = 1);

namespace Sunrise\Http\Router\Benchs;

use Sunrise\Http\Router\RouteCollection;
use Sunrise\Http\Router\Router;

/**
 * @BeforeMethods({"init"})
 */
class SunriseBench extends RouterBenchmark
{
	/**
	 * @Warmup(1)
	 * @Iterations(1000)
	 */
	public function benchSunrise()
	{
		$routes = new RouteCollection();
		for ($i = 1; $i <= $this->maxRoutes; $i++) {
			$routes->get("route:{$i}", "/route/{$i}");
		}
		$router = new Router();
		$router->addRoutes($routes);
		$router->match($this->request);
	}
}
