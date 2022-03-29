<?php
namespace app\controleurs;

require 'vendor/autoload.php';


use app\models\Game;

use app\autres\ConnectionFactory;

class ControleurPartie1 {

    private $container;

    public function __construct($container){
        
        $this->container = $container;
        
    }
    
    public function getPage($rq, $rs, $args) {
        $db = ConnectionFactory::creerConnection();

        $game = Game::where('id', '=', $args['id'])->first();
        
        return $rs->withJson($game, 201, JSON_PRETTY_PRINT);

    }
}
