<?php

use \Phpmig\Pimple\Pimple;
use \Phpmig\Adapter\PDO\Sql;
use \Illuminate\Database\Capsule\Manager as Capsule;

defined('BASE_PATH') || define('BASE_PATH', __DIR__);

Config::load();

$container = new Pimple();

$container['phpmig.migrations_path'] = Config::get('migrations_path');

$default_connection = "connections." . Config::get('default_connection');

$container['config'] = Config::get($default_connection);

$container['schema'] = $container->share(function($c) {

    $capsule = new Capsule;
    $capsule->addConnection($c['config']);
    $capsule->setAsGlobal();

    return Capsule::schema();
});

$container['db'] = $container->share(function($c) {
    return new PDO(getDsn($c['config']), $c['config']['username'], $c['config']['password']);
});

$container['phpmig.adapter'] = $container->share(function($c){
    return new Sql($c['db'], Config::get('migrations_table'));
});

return $container;
