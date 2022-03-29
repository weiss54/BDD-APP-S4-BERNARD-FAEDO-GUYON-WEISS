<?php
/**
 * 
 * Fichier index contenant toutes les requetes possible et ce qu'elles execute en consequence
 * 
 */

require 'vendor/autoload.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use teezer\controleurs\AccueilController;
use teezer\controleurs\JouerPartieController;
use teezer\controleurs\AddScoreController;
use teezer\controleurs\CreerPartieController;
use teezer\controleurs\PartieFinieController;

use teezer\autres\IntegrateurBdd;
use teezer\autres\FonctionsBdd;

$c = new \Slim\Container(['settings'=>['displayErrorDetails'=>true]]);

$app = new \Slim\App($c);

/**
 * ROUTE PAGE ACCUEIL
 */
$app->get('/', function( $rq, $rs, $args ) {
    IntegrateurBdd::$dbconfig = parse_ini_file("db.config.ini");

    $cont= new AccueilController($this) ;

   

    return $cont->getPage( $rq, $rs, $args );

    
});

$app->get('/api/games/{id}[/]', function( $rq, $rs, $args ) {
    IntegrateurBdd::$dbconfig = parse_ini_file("db.config.ini");
    $cont= new AccueilController($this);

    return $cont->getPage( $rq, $rs, $args );

    
});

$app->run();