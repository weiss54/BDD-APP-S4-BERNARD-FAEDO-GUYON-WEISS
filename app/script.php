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

$rq->requete1();
$rq->requete2();
$rq->requete3();
$rq->requete4();
$rq->requete5();