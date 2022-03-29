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

        if($q == null){
            $page = 1;
        }else{
            $page = $q;
        }

        $games = Game::skip(($page-1)*200)->take($page*200)->get();

        $res = array("games" => $games);
        
        return $rs->withJson($res, 201, JSON_PRETTY_PRINT);

    }
}
