<?php

// src/index.php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/admin.php';

use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Mustache\Silex\Provider\MustacheServiceProvider, array(
    'mustache.path' => __DIR__.'/../src/views',
    'mustache.options' => array(
        'cache' => __DIR__.'/../tmp/cache/mustache',
    ),
));

$db_config = json_decode(file_get_contents(__DIR__.'/../src/config/db.json'), true);
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'      => $db_config['host'],
        'dbname'    => $db_config['database'],
        'user'      => $db_config['username'],
        'password'  => $db_config['password'],
        'charset'   => 'utf8',
    ),
));


$app->get('/', function () use($app) {

    $sql = "SELECT * FROM abteilungen ORDER BY `name` ASC";
    $stmt = $app['db']->query($sql);

    while ($row = $stmt->fetch()) {
        if($row['parent'] == 'Region Hochwacht')
            $abteilungen_hochwacht[] = $row;
        if($row['parent'] == 'Korps Hans Waldmann')
            $abteilungen_hanswaldmann[] = $row;
    }

    $data['abt_hochwacht'] = $abteilungen_hochwacht;
    $data['abt_hanswaldmann'] = $abteilungen_hanswaldmann;
    //die("<pre>".print_r($abteilungen_hanswaldmann, true)."</pre>");

    return $app['mustache']->render('register', $data);	
});

$app->get('/thanks', function () use($app) {

    return $app['mustache']->render('thanks', $data);	
});

$app->post('/save', function(Request $request) use($app) {

    return "ok";
});

//$app->mount('/admin', new AdminControllerProvider());
$app->run();

?>