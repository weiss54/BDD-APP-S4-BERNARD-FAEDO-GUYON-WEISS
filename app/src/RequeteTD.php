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
        echo "\n\nRequete 1\n";
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
     * Les jeux dont les developpeurs ont 'Sony' dans leurs noms
     */
    public function requete3()
    {
        echo "\n\nRequete 3\n";
        $company = Company::where('name', 'like', '%Sony%')->get();
        foreach ($company as $value) {
            $value->name;
            $resJeu = $value->jeuDeveloppeParLaCompany()->get();
            foreach ($resJeu as $valueJeu) {
                echo "- " . $valueJeu->name."\n";
            }
        }

    }

    /**
     * Le rating initial (indiquer le rating board) des jeux dont le nom contient Mario
     */
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

    /**
     * Les jeux dont les developpeurs ont 'Sony' dans leurs noms
     */
    public function requete5()
    {
        echo "\n\nRequete 5\n";
        $game = Game::where('name', 'like', 'Mario%')->has('personnagesDuJeu', '>', 3)->get();
        foreach ($game as $value) {
            echo "- " .$value->name . "\n";   
        }
    }

    /**
     * Les jeux dont le nom débute par Mario et dont le rating initial contient "3+"
     */
    public function requete6(){
        echo "\n\nRequete 6\n";
        $games = Game::where('name', 'like', 'Mario%');
        $res = $games->whereHas('ratings', function($q){
            $q->where ('name', 'like', '%3+%');
        })->get();
        foreach($res as $game){
            echo "---> " . $game->name."\n";
        }
    }

     /**
     * les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient
     * "Inc." et dont le rating initial contient "3+"
     */
    public function requete7(){
        echo "\n\nRequete 7\n";
        $res = Game::whereHas('publieursDuJeu', function($q){
            $q->where ('name', 'like', '%Inc.%');
        })->whereHas('ratings', function($q){
            $q->where ('name', 'like', '%3+%');
        })->get();

        foreach($res as $game){
            echo "---> " . $game->name. "\n";
        }
    }

     /**
     * les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient
     * "Inc." et dont le rating initial contient "3+"
     */

     //Ya un pb là
    public function requete8(){
        echo "\n\nRequete 8\n";
        $res = Game::whereHas('publieursDuJeu', function($q){
            $q->where ('name', 'like', '%Inc.%');
        })->whereHas('ratings', function($q){
            $q->where ('name', 'like', '%3+%')->whereHas('ratingBoard', function($q2){
                $q2->where ('name', '=', 'CERO');
            });
        })->get();

        foreach($res as $game){
            echo "---> " . $game->name. "\n";
        }
    }
    
}