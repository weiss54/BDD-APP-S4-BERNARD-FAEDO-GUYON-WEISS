<?php
namespace app\controleurs;

require 'vendor/autoload.php';


use app\models\Game;

use app\autres\ConnectionFactory;

class ControleurPartie7 {

    private $container;

    public function __construct($container){
        
        $this->container = $container;
        
    }
    
    public function getPage($rq, $rs, $args) {
        $db = ConnectionFactory::creerConnection();

        $game = Game::where('id', '=', $args['id'])->first();
        $characters = $game->personnagesDuJeu()->get();

        $charactersRes = array();

        foreach ($characters as $value) {
            array_push($charactersRes, array("character" => $value, "links" => [
                "self" => array(
                    "href" => "api/characters/$value->id"
                )
            ]));
        }

        $res = array("characters" => $charactersRes);
        
        return $rs->withJson($res, 201, JSON_PRETTY_PRINT);

    }
}
