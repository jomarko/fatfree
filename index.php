<?php

// Kickstart the framework
$f3=require('lib/base.php');

if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('app/config.ini');

// Define routes
$f3->config('app/routes.ini');

// Define database
$f3->config('app/database.ini');


$db=new DB\SQL(
    $f3->get('DBHOST'),
    $f3->get('DBUSER'),
    $f3->get('DBPASSWORD')
);

$f3->set('DB', $db);

$f3->set('sections', $f3->get('DB')->exec('SELECT * FROM p_sections ORDER BY id;'));
$f3->set('articles', $f3->get('DB')->exec('SELECT * FROM p_articles ORDER BY id_category;'));

$f3->run();
