<?php
/**
 * Router Benchmark
 * Attogram Router - Integer Control
 */
declare(strict_types = 1);

namespace Sunrise\Http\Router\Benchs;

use Attogram\Router\Router;

/**
 * @BeforeMethods({"init"})
 */
class AttogramIntegerBench extends RouterBenchmark
{
	/**
	 * @Warmup(1)
	 * @Iterations(1000)
	 */
	public function benchAttogramInteger()
	{
		$router = new Router();
		for ($i = 1; $i <= $this->maxRoutes; $i++) {
			$router->allow("/route/$i/", $i); // integer control
		}
		$router->match();
	}
}
