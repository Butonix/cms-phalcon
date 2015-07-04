<?php
return new \Phalcon\Config(array(
    'database' => array(
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'     => 'phalcon',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir' => __DIR__ . '/../models/',
        'viewsDir' => __DIR__ . '/../views/',
        'libraryDir' => __DIR__ . '/../library/', 
        'pluginsDir' => __DIR__ . '/../plugin/', 
        'cacheDir'  => __DIR__ . '/../cache/',
        'migrationsDir'  => __DIR__ . '/../migrations/',
        'baseUri' => '/'
    ),
    'frontend' =>array(
        'controllersDir' => __DIR__ . '/../modules/frontend/controllers/',
        'viewsDir' => __DIR__ . '/../modules/frontend/views/',
    ),    
    'backend' =>array(
        'controllersDir' => __DIR__ . '/../modules/backend/controllers/',
        'viewsDir' => __DIR__ . '/../modules/backend/views/',
    )
));