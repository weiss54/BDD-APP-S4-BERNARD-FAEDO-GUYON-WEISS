<?php

require_once __DIR__ . '/vendor/autoload.php';


use app\models\User;
use app\models\Comment;
use Illuminate\Database\Capsule\Manager as DB;


$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));

$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

$comment = new Comment();

$utilisateur = new User();
$utilisateur->email = 'theo.guyon@gmail.com';
$utilisateur->nom = 'Guyon';
$utilisateur->prenom = 'Theo';
$utilisateur->adresse = '12 rue des Jonquilles';
$utilisateur->numtel = '0654528554';
$utilisateur->dateNaissance= '12/12/2002';
$utilisateur->save();

$utilisateur2 = new User();
$utilisateur2->email = 'leo.weiss@gmail.com';
$utilisateur2->nom = 'Weiss';
$utilisateur2->prenom = 'Leo';
$utilisateur2->adresse = '12 rue des Coquellicots';
$utilisateur2->numtel = '0652417548';
$utilisateur2->dateNaissance= '01/03/2002';
$utilisateur2->save();

