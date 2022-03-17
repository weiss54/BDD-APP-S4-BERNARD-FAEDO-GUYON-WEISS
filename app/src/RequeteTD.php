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
        $time_start = microtime(true);
        $rq = $jeu->personnagesDuJeu()->get();
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time . " seconds";
    }

    /**
     * Les personnages des jeux dont le nom (du jeu) débute par 'Mario'
     */
    public function requete2()
    {
        echo "\n\nRequete 2\n";
        $time_start = microtime(true);
        $games = Game::where('name', 'like', 'Mario%')->get();
        foreach ($games as $value) {
            $resPersonnages = $value->personnagesDuJeu()->get();
        }
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time . " seconds";

    }

    /**
     * Les jeux dont les developpeurs ont 'Sony' dans leurs noms
     */
    public function requete3()
    {
        echo "\n\nRequete 3\n";
        $time_start = microtime(true);
        $company = Company::where('name', 'like', '%Sony%')->get();
        foreach ($company as $value) {
            $value->name;
            $resJeu = $value->jeuDeveloppeParLaCompany()->get();
        }
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time . " seconds";

    }

    /**
     * Le rating initial (indiquer le rating board) des jeux dont le nom contient Mario
     */
    public function requete4()
    {
        echo "\n\nRequete 4\n";
        $time_start = microtime(true);
        $games = Game::where('name', 'like', '%Mario%')->get();
        foreach($games as $game){
            $ratings = $game->ratings()->get();
            foreach($ratings as $rating){
                $boards = $rating->ratingBoard()->get();
            }
        }
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time . " seconds";
    }

    /**
     * Les jeux dont les developpeurs ont 'Sony' dans leurs noms
     */
    public function requete5()
    {
        echo "\n\nRequete 5\n";
        $time_start = microtime(true);
        $game = Game::where('name', 'like', 'Mario%')->has('personnagesDuJeu', '>', 3)->get();
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time . " seconds";
    }

    /**
     * Les jeux dont le nom débute par Mario et dont le rating initial contient "3+"
     */
    public function requete6(){
        echo "\n\nRequete 6\n";
        $time_start = microtime(true);
        $games = Game::where('name', 'like', 'Mario%');
        $res = $games->whereHas('ratings', function($q){
            $q->where ('name', 'like', '%3+%');
        })->get();
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time . " seconds";
    }

     /**
     * les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient
     * "Inc." et dont le rating initial contient "3+"
     */
    public function requete7(){
        echo "\n\nRequete 7\n";
        $time_start = microtime(true);
        $res = Game::whereHas('publieursDuJeu', function($q){
            $q->where ('name', 'like', '%Inc.%');
        })->whereHas('ratings', function($q){
            $q->where ('name', 'like', '%3+%');
        })->get();
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time . " seconds";

    }

     /**
     * les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient
     * "Inc." et dont le rating initial contient "3+"
     */

     //Ya un pb là
    public function requete8(){
        echo "\n\nRequete 8\n";
        $time_start = microtime(true);
        $res = Game::whereHas('publieursDuJeu', function($q){
            $q->where ('name', 'like', '%Inc.%');
        })->whereHas('ratings', function($q){
            $q->where ('name', 'like', '%3+%')->whereHas('ratingBoard', function($q2){
                $q2->where ('name', '=', 'CERO');
            });
        })->get();
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time . " seconds";

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

    public function requeteListerJeuxNomDebutePar($nom)
    {
        $time_start = microtime(true);
        $games = Game::where('name', 'like', $nom.'%')->get();
        foreach ($games as $value) {
            $resPersonnages = $value->personnagesDuJeu()->get();
        }
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time;
    }

    public function requeteListerJeuxNomContient($nom)
    {
        $time_start = microtime(true);
        $games = Game::where('name', 'like', '%'.$nom.'%')->get();
        foreach ($games as $value) {
            $resPersonnages = $value->personnagesDuJeu()->get();
        }
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo "time : " . $time;
    }

    public function requetCompagnieDansPays($pays)
    {
        $time_start = microtime(true);
        $compagnies = Company::where('location_country', '=', $pays)->get();
        $time_end = microtime(true);
        foreach ($compagnies as $value) {
            echo $value->name;
        }
        $time = $time_end - $time_start;
        echo "time : " . $time;
    }

}