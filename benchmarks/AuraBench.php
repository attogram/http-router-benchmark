<?php

namespace Sunrise\Http\Router\Benchs;

use Aura\Router\RouterContainer;
use Sunrise\Http\ServerRequest\ServerRequestFactory;

/**
 * @BeforeMethods({"init"})
 */
class AuraBench
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
	public function benchAuraMatch()
	{
		$routerContainer = new RouterContainer();

		$map = $routerContainer->getMap();

		for ($i = 1; $i <= $this->maxRoutes; $i++)
		{
			$map->get("route:{$i}", "/route/{$i}", function() {});
		}

		$matcher = $routerContainer->getMatcher();
		$matcher->match($this->request);
	}
}
