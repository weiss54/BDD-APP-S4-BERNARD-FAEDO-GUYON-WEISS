<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\models\Comment;
use app\models\Game;
use app\models\User;
use app\RequeteTD;
use app\RequeteTD_p2;
use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));

$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

// On cree un objet faker
$faker = Faker\Factory::create();

// On supprime toutes les données dans les tables user et comment
User::query()->delete();
Comment::query()->delete();

// On génère les données pour la table user
for ($i = 0; $i < 25000; $i++) {
    $user = new User();
    $user->nom = $faker->lastName();
    $user->prenom = $faker->firstName();
    $user->email = strtolower($user->prenom) . "." . strtolower($user->nom) . rand(0, 10000) . "@" . $faker->freeEmailDomain();
    $user->adresse = $faker->address();
    $user->numTel = $faker->phoneNumber();
    $user->dateNaissance = $faker->date();
    try {
        $user->save();
    } catch (Exception $e) { // si une exception est lancée a cause de la clé primaire, on change le nom de domaine par un autre
        $user->email = $user->prenom . "." . $user->nom . rand(0, 10000) . "@" . $faker->safeEmailDomain();
        try {
            $user->save();
        } catch (Exception $ee) { // dans le cas où l'exception se poursuis, on désincremente i de 1 pour relancer toutes les valeurs
            $i--;
        }
    }
}

// On recupere tous les email user et les id games
$users = User::select('email')->get();
$games = Game::select('id')->get();

// On gènere les données pour la table comment
for ($i=0; $i<250000; $i++) {
    $com = new Comment();
    $com->titre = $faker->sentence();
    $com->contenu = $faker->paragraph();
    $com->created_at = $faker->date();
    $com->emailUser = $users[rand(1, count($users, COUNT_NORMAL))-1]->email;
    $com->idGame = $games[rand(1, count($games, COUNT_NORMAL))-1]->id;
    try {
        $com->save();
    } catch (Exception $e) {
        $i--;
    }
}

// On lance les requetes

$requete = new RequeteTD_p2();
echo "Requete 1:\n";
$requete->requete1($users[0]->email);
echo "\nReq2\n";
$requete->requete2();