<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\RequeteTD;
use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));

$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

$requete = new RequeteTD();

/** QUESTION 1 **/

$requete->requete1();

/** QUESTION 2 **/

$requete->requete2();

/** QUESTION 3 **/

$requete->requete3();

/** QUESTION 4 **/

$requete->requete4();

/** QUESTION 5 **/

$requete->requete5();



