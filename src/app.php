<?php

use Silex\Application;
use Silex\Provider\CsrfServiceProvider;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Illuminate\Database\Capsule\Manager as Capsule;

$app = new Application();

$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new SessionServiceProvider());
$app->register(new CsrfServiceProvider());

$app->register(new TwigServiceProvider(), [
    'twig.path' => '../templates',
]);
$app->register(new Silex\Provider\MonologServiceProvider(), [
    'monolog.logfile' => __DIR__.'/../logs/development.log',
]);

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => DB_HOSTNAME,
    'database' => DB_DATABASE,
    'username' => DB_USERNAME,
    'password' => DB_PASSWORD,
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$app['debug'] = true;

return $app;
