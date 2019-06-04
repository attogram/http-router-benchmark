<?php
/**
 * Router Benchmark
 * Attogram Router - String Control
 */
declare(strict_types = 1);

namespace Sunrise\Http\Router\Benchs;

use Attogram\Router\Router;

/**
 * @BeforeMethods({"init"})
 */
class AttogramStringBench extends RouterBenchmark
{
	/**
	 * @Warmup(1)
	 * @Iterations(1000)
	 */
	public function benchAttogramString()
	{
		$router = new Router();
		for ($i = 1; $i <= $this->maxRoutes; $i++) {
			$router->allow("/route/$i/", "$i"); // string control
		}
		$router->match();
	}
}
