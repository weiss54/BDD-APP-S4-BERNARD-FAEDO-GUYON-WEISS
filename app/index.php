<?php
/**
 * 
 * Fichier index contenant toutes les requetes possible et ce qu'elles execute en consequence
 * 
 */

require 'vendor/autoload.php';

use app\controleurs\ControleurPartie1;
use app\controleurs\ControleurPartie2;
use app\controleurs\ControleurPartie7;
use app\controleurs\ControleurPartie5;

$c = new \Slim\Container(['settings'=>['displayErrorDetails'=>true]]);

$app = new \Slim\App($c);

/**
 * ROUTE PAGE ACCUEIL
 */
$app->get('/', function( $rq, $rs, $args ) {
    
});

$app->get('/api/games/{id}[/]', function( $rq, $rs, $args ) {
    $cont= new ControleurPartie1($this);

    return $cont->getPage( $rq, $rs, $args );
});

$app->get('/api/games[/]', function( $rq, $rs, $args ) {
    $cont= new ControleurPartie2($this);

    return $cont->getPage( $rq, $rs, $args );  
});

$app->get('/api/games/{id}/characters', function( $rq, $rs, $args ) {
    $cont= new ControleurPartie7($this);

    return $cont->getPage( $rq, $rs, $args );  
});


/**
 * Partie 5
 */
$app->get('/api/games/{id}/comments[/]', function( $rq, $rs, $args ) {
    $cont= new ControleurPartie5($this);
    return $cont->getPage( $rq, $rs, $args );
});

$app->run();