<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\RequeteTD_p2;
use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));

$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

$requete = new RequeteTD_p2();

$requete->requete1("theo.guyon@gmail.com");