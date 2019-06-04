<?php
/**
 * Router Benchmark
 * FastRoute Router
 */
declare(strict_types = 1);

namespace Sunrise\Http\Router\Benchs;

use FastRoute\RouteParser\Std as RouteParser;
use FastRoute\DataGenerator\GroupCountBased as DataGenerator;
use FastRoute\Dispatcher\GroupCountBased as Dispatcher;
use FastRoute\RouteCollector;

/**
 * @BeforeMethods({"init"})
 */
class FastRouteBench extends RouterBenchmark
{
	/**
	 * @Warmup(1)
	 * @Iterations(1000)
	 */
	public function benchFastRouteMatch()
	{
		$map = new RouteCollector(new RouteParser(), new DataGenerator());
		for ($i = 1; $i <= $this->maxRoutes; $i++) {
			$map->get("/route/{$i}", function() {});
		}
		$dispatcher = new Dispatcher($map->getData());
		$dispatcher->dispatch($this->request->getMethod(), $this->request->getUri()->getPath());
	}
}
