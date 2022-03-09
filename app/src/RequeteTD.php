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
        echo "\n\nRequete 2\n";
        $game = Game::where('name', 'like', 'Mario%')->get();
        foreach ($game as $value) {
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

}