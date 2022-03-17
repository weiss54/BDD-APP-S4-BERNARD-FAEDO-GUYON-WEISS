<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\RequeteTD;
use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));

$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

$requete = new RequeteTD();

/** PARTIE I, QUESTION 1 */
/*
$requete->requete1();
$requete->requete2();
$requete->requete3();
$requete->requete4();
$requete->requete5();
$requete->requete6();
$requete->requete7();
$requete->requete8();
$requete->requete9();*/

/** PARTIE I, QUESTION 2 */

/*
print "\n\nJeux commençant par Mario\n";
$requete->requeteListerJeuxNomDebutePar("Mario");
print "\nJeux commençant par Sony\n";
$requete->requeteListerJeuxNomDebutePar("Sony");
print "\nJeux commençant par Zelda\n";
$requete->requeteListerJeuxNomDebutePar("Zelda");

print "\n\nJeux contenant Mario\n";
$requete->requeteListerJeuxNomContient("Mario");
print "\nJeux contenant Sony\n";
$requete->requeteListerJeuxNomContient("Sony");
print "\nJeux contenant Zelda\n";
$requete->requeteListerJeuxNomContient("Zelda");*/


print "\n\nCompgnies au Washington\n";
$requete->requetCompagnieDansPays("Washington");
print "\n\nCompgnies au Vietnam\n";
$requete->requetCompagnieDansPays("Vietnam");
print "\n\nCompgnies au USA\n";
$requete->requetCompagnieDansPays("USA");