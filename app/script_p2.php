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

$faker = Faker\Factory::create();

User::query()->delete();
Comment::query()->delete();
for ($i = 0; $i < 25000; $i++) {
    $user = new User();
    $user->nom = $faker->unique()->lastName();
    $user->prenom = $faker->unique()->firstName();
    $user->email = strtolower($user->prenom) . "." . strtolower($user->nom) . "@" . $faker->freeEmailDomain();
    $user->adresse = $faker->address();
    $user->numTel = $faker->e164PhoneNumber();
    $user->dateNaissance = $faker->date();
    try {
        $user->save();
    } catch (Exception $e) { // si une exception est lancée a cause de la clé primaire, on change le nom de domaine par un autre
        $user->email = $user->prenom . "." . $user->nom . "@" . $faker->safeEmailDomain();
        try {
            $user->save();
        } catch (Exception $ee) { // dans le cas où l'exception se poursuis, on désincremente i de 1 pour relancer toutes les valeurs
            $i--;
        }
    }
}

$users = User::select('email')->get();
$games = Game::select('id')->get();

for ($i=0; $i<250000; $i++) {
    $com = new Comment();
    $com->titre = $faker->sentence();
    $com->contenu = $faker->paragraph();
    $com->created_at = $faker->date();
    $com->emailUser = $users[rand(0, count($users, COUNT_NORMAL))]->email;
    $com->idGame = $games[rand(0, count($games, COUNT_NORMAL))]->id;
    try {
        $com->save();
    } catch (Exception $e) {
        $i--;
    }
    echo $i."\n";
}

$requete = new RequeteTD_p2();

$requete->requete1("theo.guyon@gmail.com");