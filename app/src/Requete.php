<?php

use app\models\Game;

class Requete
{

    public function requete1() {
        return Game::select ('name')->where('name', 'like', '%Mario%');
    }

    public function requete2(){
        return Compagny::where('name', 'like', '%Mario%');
    }

}