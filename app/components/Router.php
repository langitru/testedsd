<?php

namespace Components;

use Controllers\PostController;
use FastRoute;
use DI\ContainerBuilder;
use League\Plates\Engine;


class Router
{
	public function __construct()
	{
		$dispatcher = FastRoute\simpleDispatcher(
			function (FastRoute\RouteCollector $r) {
				$r->addRoute('GET', '/',                    ['Controllers\PostController', 'Index']);
				$r->addRoute('POST', '/',                   ['Controllers\PostController', 'Index']);
				$r->addRoute('POST', '/number',             ['Controllers\PostController', 'Number']);

				// {id} must be a number (\d+)
				// $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
				// The /{title} suffix is optional
				// $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
			}
		);

		// Fetch method and URI from somewhere
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		// Strip query string (?foo=bar) and decode URI
		if (false !== $pos = strpos($uri, '?')) {
			$uri = substr($uri, 0, $pos);
		}
		$uri = rawurldecode($uri);

		$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

		switch ($routeInfo[0]) {
			case FastRoute\Dispatcher::NOT_FOUND:
				// ... 404 Not Found
				PostController::Error('404');
				break;
			case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
				$allowedMethods = $routeInfo[1];
				// ... 405 Method Not Allowed
				PostController::Error('405');
				break;
			case FastRoute\Dispatcher::FOUND:
				$handler = $routeInfo[1];
				$vars = $routeInfo[2];
				// ... call $handler with $vars

				$builder = new ContainerBuilder();

				$builder->addDefinitions(
					[
						Engine::class => function () {
							return new Engine('../app/views');
						},
					]
				);

				$container = $builder->build();

				$container->call($handler, [$vars]);
				break;
		}
	}
}
