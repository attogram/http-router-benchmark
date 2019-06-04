<?php
/**
 * Router Benchmark
 * Aura Router
 */
declare(strict_types = 1);

namespace Sunrise\Http\Router\Benchs;

use Aura\Router\RouterContainer;

/**
 * @BeforeMethods({"init"})
 */
class AuraBench extends RouterBenchmark
{
	/**
	 * @Warmup(1)
	 * @Iterations(1000)
	 */
	public function benchAuraMatch()
	{
		$routerContainer = new RouterContainer();
		$map = $routerContainer->getMap();
		for ($i = 1; $i <= $this->maxRoutes; $i++) {
			$map->get("route:{$i}", "/route/{$i}", function() {});
		}
		$matcher = $routerContainer->getMatcher();
		$matcher->match($this->request);
	}
}
