<?php

namespace app;

use app\models\Character;
use app\models\Company;
use app\models\Game;
use app\models\Genre;


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
    

    public function requete9(){
        echo "\n\nRequete 9\n";
        $genre = new Genre();
        $genre->name = "Leo";
        $genre->description = "requete9";
        $genre->save();

        $g1 = Game::find(12);
        $g1->genres()->save($genre);       
        Game::find(56)->genres()->save($genre);
        Game::find(345)->genres()->save($genre);
        echo "requete9 terminer";
    }
}