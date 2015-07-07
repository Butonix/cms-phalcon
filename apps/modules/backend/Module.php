<?php

namespace Modules\Backend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\DiInterface;
use Phalcon\Db\Adapter\Pdo\Mysql as Database;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

class Module
{

	public function registerAutoloaders()
	{

		$loader = new Loader();

		$loader->registerNamespaces(array(
			'Modules\Backend\Controllers' => __DIR__ .'/controllers/',
			'Modules\Backend\Models'      => '../apps/backend/models/',
			'Modules\Backend\Plugins'     => '../apps/backend/plugins/',
		));

		$loader->register();
	}

	/**
	 * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
	 */
	public function registerServices(DiInterface $di)
	{
		/**
	     * Read the configuration
	     */
	    $config = include  __DIR__ ."/../../config/config.php";

		//Registering a dispatcher
		$di->set('dispatcher', function() {
			$dispatcher = new Dispatcher();
			$dispatcher->setDefaultNamespace("Modules\Backend\Controllers\\");
			return $dispatcher;
		});

		//Registering the view component
		// $di->set('view', function() {
		// 	$view = new View();
		// 	$view->setViewsDir('../apps/backend/views/');
		// 	return $view;
		// });
		$di->set('view', function () use ($config) {
		    $view = new \Phalcon\Mvc\View();

		    $view->setViewsDir($config->backend->viewsDir);

		    $view->registerEngines(array(
		        '.volt' => function ($view, $di) use ($config) {

		            $volt = new VoltEngine($view, $di);

		            $volt->setOptions(array(
		                'compiledPath' => $config->application->cacheDir,
		                'compiledSeparator' => '_'
		            ));

		            return $volt;
		        },
		        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
		    ));

		    return $view;
		});

		//Set a different connection in each module
		$di->set('db', function() {
			return new Database(
				$config->database->toArray()
				// array(
				// 	"host" => "localhost",
				// 	"username" => "root",
				// 	"password" => "secret",
				// 	"dbname" => "invo"
				// )
			);
		});
	}
}
