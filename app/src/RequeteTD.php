<?php

namespace app;

use app\models\Character;
use app\models\Company;
use app\models\Game;

class RequeteTD{

    /**
     * Afficher (name , deck) les personnages du jeu 12342
     */
    public function requete1()
    {
        echo "\n\nRequete 1";
        $jeu = Game::find(12342);
        $rq = $jeu->personnagesDuJeu()->get();
        foreach ($rq as $value) {
            echo "- " . $value->name . "(deck:" . $value->deck . ")\n";
        }
    }

    /**
     * Les personnages des jeux dont le nom (du jeu) débute par 'Mario'
     */
    public function requete2()
    {
        echo "\n\nRequete 2";
        $games = Game::where('name', 'like', 'Mario%')->get();
        foreach ($games as $value) {
            $resPersonnages = $value->personnagesDuJeu()->get();
            foreach ($resPersonnages as $valuePersonnages) {
                echo "- " . $valuePersonnages->name."\n";
            }
        }

    }

    /**
     * Les personnages des jeux dont le nom (du jeu) débute par 'Mario'
     */
    public function requete3()
    {
        echo "\n\nRequete 3";
        $company = Company::where('name', 'like', '%Sony%');
        foreach ($company as $value) {
            $resJeu = $value->jeuDeveloppeParLaCompany()->get();
            foreach ($resJeu as $valueJeu) {
                echo "- " . $valueJeu->name."\n";
            }
        }

    }

    
    public function requete4()
    {
        echo "\n\nRequete 4";
        $games = Game::where('name', 'like', '%Mario%')->get();
        foreach($games as $game){
            $ratings = $game->ratings()->get();
            echo "---> " . $game->name."\n";

            foreach($ratings as $rating){
                $boards = $rating->ratingBoard()->get();
                foreach($boards as $board){
                echo " * " . $rating->name." (".$board->name.")\n";
                }
            }
        }
    }

}