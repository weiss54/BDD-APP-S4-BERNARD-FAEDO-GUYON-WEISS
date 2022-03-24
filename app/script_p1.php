<?php

require_once __DIR__ . '/vendor/autoload.php';


use app\models\User;
use app\models\Comment;
use Illuminate\Database\Capsule\Manager as DB;


$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));

$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

User::query()->delete();
Comment::query()->delete();

$utilisateur = new User();
$utilisateur->email = 'theo.guyon@gmail.com';
$utilisateur->nom = 'Guyon';
$utilisateur->prenom = 'Theo';
$utilisateur->adresse = '12 rue des Jonquilles';
$utilisateur->numtel = '0654528554';
$utilisateur->dateNaissance= '12/12/2002';
$utilisateur->save();

$commentaire1 = new Comment();
$commentaire1->titre = 'incroyable';
$commentaire1->contenu = 'leo est un peu chiant ';
$commentaire1->created_at = new DateTime();
$commentaire1->updated_at = new DateTime();
$commentaire1->emailUser = $utilisateur->email;
$commentaire1->idGame = 12342;
$commentaire1->save();


$commentaire2 = new Comment();
$commentaire2->titre = 'oui';
$commentaire2->contenu = 'ouistiti ouistiti ouistiti ';
$commentaire2->created_at = new DateTime();
$commentaire2->updated_at = new DateTime();
$commentaire2->emailUser = $utilisateur->email;
$commentaire2->idGame = 12342;
$commentaire2->save();

$commentaire3 = new Comment();
$commentaire3->titre = 'oumpa';
$commentaire3->contenu = 'oumpa loumpa oumpa loumpa';
$commentaire3->created_at = new DateTime();
$commentaire3->updated_at = new DateTime();
$commentaire3->emailUser = $utilisateur->email;
$commentaire3->idGame = 12342;
$commentaire3->save();



$utilisateur2 = new User();
$utilisateur2->email = 'leo.weiss@gmail.com';
$utilisateur2->nom = 'Weiss';
$utilisateur2->prenom = 'Leo';
$utilisateur2->adresse = '12 rue des Coquellicots';
$utilisateur2->numtel = '0652417548';
$utilisateur2->dateNaissance= '01/03/2002';
$utilisateur2->save();

$commentaire4 = new Comment();
$commentaire4->titre = 'genial';
$commentaire4->contenu = 'le jeux est une masterclasse ';
$commentaire4->emailUser = $utilisateur2->email;
$commentaire4->idGame = 12342;
$commentaire4->save();

$commentaire4 = new Comment();
$commentaire4->titre = 'choucou';
$commentaire4->contenu = 'choucou choucou a choucou-iland ';
$commentaire4->emailUser = $utilisateur2->email;
$commentaire4->idGame = 12342;
$commentaire4->save();

$commentaire4 = new Comment();
$commentaire4->titre = 'theo';
$commentaire4->contenu = 'aime le JS';
$commentaire4->emailUser = $utilisateur2->email;
$commentaire4->idGame = 12342;
$commentaire4->save();

