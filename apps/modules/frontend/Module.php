<?php

namespace Modules\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\Dispatcher;
// use Phalcon\Db\Adapter\Pdo\Mysql as;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

class Module
{

	public function registerAutoloaders()
	{

		$loader = new Loader();
		//var_dump( __DIR__ .'/controllers/');
		//die();
		$loader->registerNamespaces(array(
			'Modules\Frontend\Controllers' => __DIR__ .'/controllers/',
			// 'Modules\Frontend\Models' => '../apps/frontend/models/',
			'Modules\Models\Entities' => __DIR__ . '/../../models/entities/',
            'Modules\Models\Services' => __DIR__ . '/../../models/services/',
            'Modules\Models\Repositories' => __DIR__ . '/../../models/repositories/'
		));

		$loader->register();
	}

	/**
	 * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
	 */
	public function registerServices($di)
	{
		/**
	     * Read the configuration
	     */
	    $config = include  __DIR__ ."/../../config/config.php";

		//Registering a dispatcher
		$di->set('dispatcher', function () {
			$dispatcher = new Dispatcher();

			//Attach a event listener to the dispatcher
			// $eventManager = new \Phalcon\Events\Manager();
			// $eventManager->attach('dispatch', new \Acl('frontend'));

			// $dispatcher->setEventsManager($eventManager);
			$dispatcher->setDefaultNamespace("Modules\Frontend\Controllers\\");
			return $dispatcher;
		});

		//Registering the view component
		// $di->set('view', function () {
		// 	$view = new \Phalcon\Mvc\View();
		// 	$view->setViewsDir('../apps/frontend/views/');
		// 	return $view;
		// });
		$di->set('view', function () use ($config) {
		    $view = new \Phalcon\Mvc\View();

		    $view->setViewsDir($config->frontend->viewsDir);

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
		$di->set('db', function () use($config) {
			return new DbAdapter(//Database(
				$config->database->toArray()
			// 	array(
			// 	"host" => "localhost",
			// 	"username" => "root",
			// 	"password" => "secret",
			// 	"dbname" => "invo"
			// )
			);
		});
	}
}
