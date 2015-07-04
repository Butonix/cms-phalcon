<?php
	
use Phalcon\DI\FactoryDefault;
use Phalcon\Loader;
use Phalcon\Mvc\Router;

		$di = new FactoryDefault();

		$loader = new Loader();

		/**
		 * We're a registering a set of directories taken from the configuration file
		 */
		$loader->registerDirs(
			array(
				__DIR__ . '/../apps/library/'
			)
		)->register();
		
		//Registering a router
		$di->set('router', function(){

			$router = new Router();

			$router->setDefaultModule("frontend");

			$router->add('/:controller/:action', array(
				'module' => 'frontend',
				'controller' => 1,
				'action' => 2,
			));

			$router->add("/login", array(
				'module' => 'backend',
				'controller' => 'login',
				'action' => 'index',
			));

			$router->add("/admin/products/:action", array(
				'module' => 'backend',
				'controller' => 'products',
				'action' => 1,
			));

			$router->add("/products/:action", array(
				'module' => 'frontend',
				'controller' => 'products',
				'action' => 1,
			));

			$router->add('/admin', array(
		        'module' => "backend",
		        'action' => "index",
		        'params' => "index"
			));

			$router->add('/admin/:controller', array(
		        'module' => "backend",
		        'controller' => 1,
		        'action' => "index"
			));

			$router->add('/admin/:controller/:action/', array(
		        'module' => "backend",
		        'controller' => 1,
		        'action' => 2
			));

			$router->add('/admin/:controller/:action/:params', array(
		        'module' => "backend",
		        'controller' => 1,
		        'action' => 2,
		        'params' => 3
    		));
    		
			return $router;

		});

		$di->set('url', function () {
		  $url = new UrlResolver();
		  $url->setBaseUri('/multiple/');
		  return $url;
		});
		// $di->setShared('view', function () use ($config) {
		//     $view = new View();

		//     $view->setViewsDir($config->application->viewsDir);

		//     $view->registerEngines(array(
		//         '.volt' => function ($view, $di) use ($config) {

		//             $volt = new VoltEngine($view, $di);

		//             $volt->setOptions(array(
		//                 'compiledPath' => $config->application->cacheDir,
		//                 'compiledSeparator' => '_'
		//             ));

		//             return $volt;
		//         },
		//         '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
		//     ));

		//     return $view;
		// });
		$this->setDI($di);
	// }
?>