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

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());


$app->get('/', function () use($app) {

    if(time() >= mktime(17,0,0,10,27,2014))
        return $app->redirect($app["url_generator"]->generate("closed"));

    $data['year'] = date('Y')+1;
    //Fetching data from db for Frontend 
    $data['abt_hochwacht'] = $app['db']->fetchAll("SELECT * FROM abteilungen WHERE `parent` = 'Region Hochwacht' ORDER BY `name` ASC");
    $data['abt_hanswaldmann'] = $app['db']->fetchAll("SELECT * FROM abteilungen WHERE `parent` = 'Korps Hans Waldmann' ORDER BY `name` ASC");
    $data['kurse'] = $app['db']->fetchAll("SELECT * FROM kurse WHERE `type` = 'kurs' ORDER BY `id` ASC");
    $data['ablat'] = $app['db']->fetchAll("SELECT * FROM kurse WHERE `type` = 'ablat' ORDER BY `id` ASC");

    return $app['mustache']->render('register', $data);	
})->bind("start");

$app->get('/thanks', function () use($app) {
    $data['year'] = date('Y')+1;
    return $app['mustache']->render('thanks', $data);	
})->bind("thanks");

$app->get('/closed', function () use($app) {
    $data['year'] = date('Y')+1;
    return $app['mustache']->render('closed', $data);   
})->bind("closed");


$app->post('/save', function(Request $request) use($app) {

    if($request->get('sent') != "1")
        return $app->redirect($app["url_generator"]->generate("start"));

    $leiter = array();
    $leiter['pfadiname'] = ucfirst($request->get('pfadiname'));
    $leiter['email'] = strtolower($request->get('email'));
    $leiter['natelnummer'] = str_replace(" ", "", $request->get('natelnummer'));
    $leiter['abteilung'] = $request->get('abteilung');
    $leiter['erfahrung_1_stufe'] = $request->get('erfahrung_1_stufe');
    $leiter['erfahrung_2_stufe'] = $request->get('erfahrung_2_stufe');
    $leiter['aktuell_leiter_in'] = $request->get('aktuell_leiter_in');
    $leiter['panorama'] = $request->get('panorama');
    $leiter['bemerkung'] = $request->get('bemerkung');

    $app['db']->insert('leiter', $leiter);
    $user_id = $app['db']->fetchColumn("SELECT id FROM `leiter` WHERE `pfadiname` = '".$leiter['pfadiname']."' AND `email` = '".$leiter['email']."' AND `natelnummer` = '".$leiter['natelnummer']."'");
    $param_iterator = $request->request->getIterator();
    $kurse = array();
    while($param_iterator->valid()) {
        if(preg_match('/^intresse_kurs_/',$param_iterator->key()) && $param_iterator->current() != "nichts") {
            $kurs_key_array = explode("_", $param_iterator->key());
            $prio = ($request->get('prioritaet_kurs_'.$kurs_key_array[2]) == "") ? null : $request->get('prioritaet_kurs_'.$kurs_key_array[2]);
            $app['db']->insert('anmeldung', array("user_id" => $user_id, "kurs_id" => $kurs_key_array[2], "type" => $param_iterator->current(), "prio" => $prio));
            $kurse[] = array("user_id" => $user_id, "kurs_id" => $kurs_key_array[2], "type" => $param_iterator->current(), "prio" => $prio);
            //$ret .= $param_iterator->key() . "=" . $param_iterator->current() . " => ".$request->get('prioritaet_kurs_'.$kurs_key_array[2])."<br/>";
        }
        $param_iterator->next();
    }

    //createDataArray
    $anmeldung = array("leiter" => $leiter, "kurse" => $kurse);

    //save to log
    $filename = date("Y-m-d_H-i-s",time())."_".substr(md5(time()), 0,6).".log";
    if(!file_put_contents(getcwd()."/../tmp/log/".$filename, json_encode($anmeldung, JSON_PRETTY_PRINT))) {
        $to = "vouillamoz@gmail.com";
        $subject = "KEA - Fail Anmeldung";
        $message = "Could not write ".getcwd()."/../tmp/log/".$filename."\r\n\r\n".json_encode($anmeldung, JSON_PRETTY_PRINT);
        $headers = 'From: kea@aure5.ch';
        mail($to, $subject, $message, $headers);
    }

    return $app->redirect($app["url_generator"]->generate("thanks"));
});

//$app->mount('/admin', new AdminControllerProvider());
$app->run();

?>