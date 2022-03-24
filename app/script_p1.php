<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\RequeteTD;
use Illuminate\Database\Capsule\Manager as DB;
use models\User;
use models\Comment;

$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));

$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

$utilisateur = new User();
$utilisateur->email = 'theo.guyon@gmail.com';
$utilisateur->nom = 'Guyon';
$utilisateur->prenom = 'Theo';
$utilisateur->adresse = '12 rue des Jonquilles';
$utilisateur->numtel = '0654528554';
$utilisateur->dateNaissance= '12/12/2002';

$utilisateur2 = new User();
$utilisateur->email = 'leo.weiss@gmail.com';
$utilisateur->nom = 'Weiss';
$utilisateur->prenom = 'Leo';
$utilisateur->adresse = '12 rue des Coquellicots';
$utilisateur->numtel = '0652417548';
$utilisateur->dateNaissance= '01/03/2002';

