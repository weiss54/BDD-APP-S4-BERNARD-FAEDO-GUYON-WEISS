<?php
namespace app\controleurs;

require 'vendor/autoload.php';

use app\models\Game;

use app\autres\ConnectionFactory;

class ControleurPartie2 {

    private $container;

    public function __construct($container){
        
        $this->container = $container;
        
    }
    
    public function getPage($rq, $rs, $args) {
        $db = ConnectionFactory::creerConnection();

        $q = $rq->getQueryParam('page');

        $page;

        if($q == null || $q < 1){
            $page = 1;
        }else{
            $page = $q;
        }

        $games = Game::skip(($page-1)*200)->take($page*200)->get();

        $prochPage = $page + 1;
        $precPage = $page - 1;

        $links = array("prev" => "/api/games?page=$precPage", "next" =>  "/api/games?page=$prochPage");

        $res = array("games" => $games, "links" => $links);
        
        return $rs->withJson($res, 201, JSON_PRETTY_PRINT);

    }
}
