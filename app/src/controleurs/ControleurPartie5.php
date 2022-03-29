<?php
namespace app\controleurs;

require 'vendor/autoload.php';

use app\autres\ConnectionFactory;
use app\models\Game;

class ControleurPartie5 {

    private $container;

    public function __construct($container){
        
        $this->container = $container;
        
    }
    
    public function getPage($rq, $rs, $args) {
        $db = ConnectionFactory::creerConnection();

        $tabCommentaire = [];

        $comments = $db->table('comment')->where('idGame', '=', $args['id'])->get();
        foreach ($comments as $com) {
            $commentObj = array("id"=>$com->id, "titre"=>$com->titre, "texte"=>$com->contenu, "date_creation"=>$com->created_at, "user"=>$com->emailUser);
            $tabCommentaire[] = $commentObj;
        }
        $tabCommentaireFinal = array("comments"=>$tabCommentaire);
        return $rs->withJson($tabCommentaireFinal);

    }
}
