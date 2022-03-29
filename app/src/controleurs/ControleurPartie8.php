<?php
namespace app\controleurs;

require 'vendor/autoload.php';


use app\models\Game;
use app\models\Comment;

use app\autres\ConnectionFactory;

class ControleurPartie8 {

    private $container;

    public function __construct($container){
        
        $this->container = $container;
        
    }
    
    public function getPage($rq, $rs, $args) {
        $db = ConnectionFactory::creerConnection();

        $a = $rq->getParsedBodyParam("json");
        $tab = json_decode($a);

        $commentaire = new Comment();
        $commentaire->titre = $tab->titre;
        $commentaire->contenu = $tab->contenu;
        $commentaire->emailUser = $tab->email;
        $commentaire->idGame = $args["id"];
        $commentaire->save();

        
        return $rs->withStatus(201);

    }
}
