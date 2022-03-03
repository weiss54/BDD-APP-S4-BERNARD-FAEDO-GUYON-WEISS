<?php

namespace app;

use app\models\Game;
use app\models\Compagny;

class Requete
{

    public function requete1() {
        return Game::select('name')->where('name', 'like', '%Mario%');
    }

    public function requete2(){
        return Compagny::where('name', 'like', '%Mario%');
    }

    

}