<?php

error_reporting(E_ALL);

use Phalcon\Loader;
use Phalcon\Mvc\Router;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application as BaseApplication;
use Phalcon\Mvc\Url as UrlResolver;

class Application extends BaseApplication
{

	/**
	 * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
	 */
	protected function registerServices()
	{
		require __DIR__ . '/../apps/config/services.php';
	}
	public function main()
	{

		$this->registerServices();

		//Register the installed modules
		/**
	     * Include modules
	     */
	    require __DIR__ . '/../apps/config/modules.php';

		echo $this->handle()->getContent();
	}

}

$application = new Application();
$application->main();
