<?php

namespace app;

use app\models\Character;
use app\models\Game;

class RequeteTD
{

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
        $game = Game::where('name', 'like', '%Mario%')->get();
        foreach ($game as $value) {
            $resPersonnages = $value->personnagesDuJeu()->get();
            foreach ($resPersonnages as $valuePersonnages) {
                echo "- " . $valuePersonnages->name."\n";
            }
        }

    }

}