<?php
/**
 * 
 * Fichier index contenant toutes les requetes possible et ce qu'elles execute en consequence
 * 
 */

require 'vendor/autoload.php';

use app\controleurs\ControleurPartie1;
use app\controleurs\ControleurPartie2;

$c = new \Slim\Container(['settings'=>['displayErrorDetails'=>true]]);

$app = new \Slim\App($c);

/**
 * ROUTE PAGE ACCUEIL
 */
$app->get('/', function( $rq, $rs, $args ) {
    $cont= new ControleurJeu($this);

    return $cont->getPage( $rq, $rs, $args );

    
});

$app->get('/api/games/{id}[/]', function( $rq, $rs, $args ) {
    $cont= new ControleurPartie1($this);

    return $cont->getPage( $rq, $rs, $args );
});

$app->get('/api/games[/]', function( $rq, $rs, $args ) {
    $cont= new ControleurPartie1($this);

    return $cont->getPage( $rq, $rs, $args );

    
});

$app->run();