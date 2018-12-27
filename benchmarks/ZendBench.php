<?php

namespace Sunrise\Http\Router\Benchs;

use Sunrise\Http\ServerRequest\ServerRequestFactory;
use Zend\Psr7Bridge\Psr7ServerRequest;
use Zend\Router\Http\TreeRouteStack;

/**
 * @BeforeMethods({"init"})
 */
class ZendBench
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
	public function benchZendMatch()
	{
		$router = new TreeRouteStack();

		for ($i = 1; $i <= $this->maxRoutes; $i++)
		{
			/**
			 * @link https://github.com/zendframework/zend-expressive-zendrouter/blob/master/src/ZendRouter.php
			 */
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
