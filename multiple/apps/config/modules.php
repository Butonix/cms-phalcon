<?php
/**
 * Register application modules
 */
	$this->registerModules(array(
		'frontend' => array(
			'className' => 'Modules\Frontend\Module',
			'path' => __DIR__ .'/../modules/frontend/Module.php'
		),
		'backend' => array(
			'className' => 'Modules\Backend\Module',
			'path' => __DIR__ .'/../modules/backend/Module.php'
		)
	));
?>