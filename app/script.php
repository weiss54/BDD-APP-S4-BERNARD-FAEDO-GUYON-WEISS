<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(IntegrateurBDD::$dbconfig);
 
$db->setAsGlobal();
$db->bootEloquent(); //On lance Eloquent
