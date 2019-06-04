<?php
/**
 * Router Benchmark
 * Attogram Router - Callback Control
 */
declare(strict_types = 1);

namespace Sunrise\Http\Router\Benchs;

use Attogram\Router\Router;

/**
 * @BeforeMethods({"init"})
 */
class AttogramCallbackBench extends RouterBenchmark
{
	/**
	 * @Warmup(1)
	 * @Iterations(1000)
	 */
	public function benchAttogramCallback()
	{
		$router = new Router();
		for ($i = 1; $i <= $this->maxRoutes; $i++) {
			$router->allow("/route/$i/", function() {}); // callback control
		}
		$router->match();
	}
}
