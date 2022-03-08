<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\Requete;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));
 
$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

$rq = new Requete();

echo "\nRequete 1: Lister les jeux dont le nom contient 'Mario'.\n";
foreach ($rq->requete1() as $value) {
    echo "- ".$value->name."\n";
}
echo "\nRequete 2: Lister les compagnies installées au Japon.\n";
foreach ($rq->requete2() as $value) {
    echo "- ".$value->name."\n";
}
echo "\nRequete 3: Lister les plateformes dont la base installée est >= 10 000 000.\n";
foreach ($rq->requete3() as $value) {
    echo "- ".$value->name."\n";
}
$nb = 1;
echo "\nRequete 4: Lister 442 jeux à partir du 21173ème.\n";
foreach ($rq->requete4() as $value) {
    echo $nb.". ".$value->name."(id: ".$value->id.")\n";
    $nb++;
}
$nb = 1;
echo "\nRequete 5: Lister les jeux, afficher leur nom et deck, en paginant (taille des pages : 500).\n";
foreach ($rq->requete5() as $value) {
    echo $nb.". ".$value->name."(".$value->deck.")\n";
    $nb++;
}