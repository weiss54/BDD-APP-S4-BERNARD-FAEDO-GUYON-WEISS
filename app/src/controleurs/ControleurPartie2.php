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

        //Partie 2-3
        //On récupère les jeux
        $games = Game::skip(($page-1)*200)->take($page*200)->get();

        $gamesRes = array('games' => array(), 'links' => array());

        //Partie 4
        //On ajoute les liens pour retrouver la page du produit
        foreach ($games as $key => $value) {
            array_push($gamesRes['games'], $value);
            array_push($gamesRes['links'], 
            $value["links"] = [
                "self" => array(
                    "href" => "api/games/$value->id"
                )
            ]);
            
        }

        //Partie 3
        //On definit les numéros des prochaines et précédentes pages
        $prochPage = $page + 1;
        $precPage = $page - 1;

        //Partie 3
        //On ajoute les liens pour la pagination
        $links = array("prev" => "/api/games?page=$precPage", "next" =>  "/api/games?page=$prochPage");

        //Partie 3
        //On ajoute les jeux et les liens pour la pagination
        $res = array("games" => $gamesRes, "links" => $links);
        
        //On retourne l'objet JSON
        return $rs->withJson($res, 201, JSON_PRETTY_PRINT);

    }
}
