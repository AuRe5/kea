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

    //Fetching data from db for Frontend 
    $data['abt_hochwacht'] = $app['db']->fetchAll("SELECT * FROM abteilungen WHERE `parent` = 'Region Hochwacht' ORDER BY `name` ASC");
    $data['abt_hanswaldmann'] = $app['db']->fetchAll("SELECT * FROM abteilungen WHERE `parent` = 'Korps Hans Waldmann' ORDER BY `name` ASC");
    $data['kurse'] = $app['db']->fetchAll("SELECT * FROM kurse WHERE `type` = 'kurs' ORDER BY `id` ASC");
    $data['ablat'] = $app['db']->fetchAll("SELECT * FROM kurse WHERE `type` = 'ablat' ORDER BY `id` ASC");

    //die("<pre>".print_r($data, true)."</pre>");
    return $app['mustache']->render('register', $data);	
});

$app->get('/thanks', function () use($app) {
DateTimeZone::EUROPE;
    $data['year'] = date('Y')+1;

    return $app['mustache']->render('thanks', $data);	
});

$app->post('/save', function(Request $request) use($app) {

    $leiter = array();
    $leiter['pfadiname'] = ucfirst($request->get('pfadiname'));
    $leiter['email'] = strtolower($request->get('email'));
    $leiter['natelnummer'] = pre_replace("/\s/", "", $request->get('natelnummer'));
    $leiter['abteilung'] = $request->get('abteilung');
    $leiter['erfahrung_1_stufe'] = $request->get('erfahrung_1_stufe');
    $leiter['erfahrung_2_stufe'] = $request->get('erfahrung_2_stufe');
    $leiter['aktuell_leiter_in'] = $request->get('aktuell_leiter_in');
    $leiter['panorama'] = $request->get('panorama');
    $leiter['bemerkung'] = $request->get('bemerkung');

    $sql = "INSERT INTO `kea`.`leiter` (`pafdiname`, `email`, `natelnummer`, `abteilung`, `erfahrung_1_stufe`, `erfahrung_2_stufe`, `aktuell_leiter_in`, `panorama`, , `bemerkung`) VALUES ('".$leiter['pfadiname']."', '".$leiter['email']."', '".$leiter['natelnummer']."', '".$leiter['abteilung']."', '".$leiter['erfahrung_1_stufe']."', '".$leiter['erfahrung_2_stufe']."', '".$leiter['aktuell_leiter_in']."', '".$leiter['panorama']."', '".$leiter['bemerkung']."');"
    return "ok";
});

//$app->mount('/admin', new AdminControllerProvider());
$app->run();

?>