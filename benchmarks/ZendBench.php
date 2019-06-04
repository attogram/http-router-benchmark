<?php
/**
 * Router Benchmark
 * Zend Router
 */
declare(strict_types = 1);

namespace Sunrise\Http\Router\Benchs;

use Zend\Psr7Bridge\Psr7ServerRequest;
use Zend\Router\Http\TreeRouteStack;

/**
 * @BeforeMethods({"init"})
 */
class ZendBench extends RouterBenchmark
{
	/**
	 * @Warmup(1)
	 * @Iterations(1000)
     *
     * @link https://github.com/zendframework/zend-expressive-zendrouter/blob/master/src/ZendRouter.php
	 */
	public function benchZend()
	{
		$router = new TreeRouteStack();
		for ($i = 1; $i <= $this->maxRoutes; $i++) {
			$router->addRoute("route:{$i}", [
				'type' => 'segment',
				'options' => [
					'route' => "/route/{$i}",
				],
				'may_terminate' => false,
				'child_routes' => [
					'GET' => [
						'type' => 'method',
						'options' => [
							'verb' => 'GET',
						],
					],
					'method_not_allowed'=> [
						'type' => 'regex',
						'priority' => -1,
						'options' => [
							'regex' => '',
							'defaults' => [
								'method_not_allowed' => "/route/{$i}",
							],
							'spec' => '',
						],
					],
				],
			]);
		}
		$router->match(Psr7ServerRequest::toZend($this->request, true));
	}
}
