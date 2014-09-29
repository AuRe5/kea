<?php

// src/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/hello/{name}', function ($name) use ($app) {

	$m = new Mustache_Engine;
	return $m->render('Hello, {{planet}}!', array('planet' => $app->escape($name))); 
	
});

$app->run();

?>