<?php
namespace app\controleurs;

require 'vendor/autoload.php';

use app\vues\VueRequete;

use app\autres\ConnectionFactory;

class ControleurPartie1 {

    private $container;

    public function __construct($container){
        
        $this->container = $container;
        
    }
    
    public function getPage($rq, $rs, $args) {
        $db = ConnectionFactory::creerConnection();

        $game = Game::where('id', '=', $args['id'])->first();
        
        return $rs->withJson($game);

    }
}
