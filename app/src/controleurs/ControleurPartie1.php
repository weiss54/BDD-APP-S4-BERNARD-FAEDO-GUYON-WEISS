<?php
namespace app\controleurs;

require 'vendor/autoload.php';

use app\models\Game;
use app\vues\VueRequete;

use app\autres\ConnectionFactory;

class ControleurPartie1 {

    private $container;

    public function __construct($container){
        
        $this->container = $container;
        
    }
    
    public function getPage($rq, $rs, $args) {
        $db = ConnectionFactory::creerConnection();
        $game = $db->table('game')->where('id', '=', $args['id'])->first();
        $g = new Game();
        $g->id = $game->id;
        $platforms = $g->plateformes()->get();
        $tabPlat = [];
        foreach ($platforms as $p) {
            $obj = array(
                "id"=>$p->id,
                "name"=>$p->name,
                "alias"=>$p->alias,
                "abbreviation"=>$p->abbreviation,
                "url"=>'/api/platform/'.$p->id
            );
            $tabPlat[] = $obj;
        }
        $tabGame = array(
            "id"=>$game->id,
            "name"=>$game->name,
            "alias"=>$game->alias,
            "deck"=>$game->deck,
            "description"=>$game->description,
            "original_release_date"=>$game->original_release_date,
            "plateforms"=>$tabPlat
        );
        $links = array("comments"=>array("href"=>"/api/games/".$args['id']."/comments"), "characters"=>array("href"=>"/api/games/".$args['id']."/characters"));
        $tabFinal = array("game"=>$tabGame, "links"=>$links);
        return $rs->withJson($tabFinal);

    }
}
