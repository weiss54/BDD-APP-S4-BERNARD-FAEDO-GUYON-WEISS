<?php



use app\Requete;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(parse_ini_file("db.config.ini"));
 
$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent

$rq = new Requete();

foreach ($rq->requete1() as $key => $value) {
    echo $value->id;
}


/*
$rq->requete2();
$rq->requete3();
$rq->requete4();
$rq->requete5();*/