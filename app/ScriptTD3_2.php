<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\RequeteTD;
use app\RequeteTD_p2;
use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));

$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

DB::connection()->enableQueryLog();

$requete = new RequeteTD_p2();


/** QUESTION 1 **/

$requete->requete1();

/** QUESTION 2 **/

$requete->requete2();

/** QUESTION 3 */

$requete->requete3();

/** QUESTION 4 */

$requete->requete4();



//Affichage logs
foreach( DB::getQueryLog() as $q){
    echo "-------------- \n";
    echo "query : " . $q['query'] ."\n";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---\n";
    echo "-------------- \n \n";
};




