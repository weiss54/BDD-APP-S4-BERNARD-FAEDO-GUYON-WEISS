<?php

namespace app;

use app\models\Game;
use app\models\Compagny;
use app\models\Platform;

class Requete
{

    public function requete1() {
        return Game::select('name')->where('name', 'like', '%Mario%')->get();
    }

    public function requete2(){
        return Compagny::where('location_country', '=', 'Japan')->get();
    }

    public function requete3()
    {
        return Platform ::Where('install_base', '>=', '10000000')->get();
    }

    public function requete4()
    {
        return Game::where('id', '>=', '21173')->limit(442);
    }

    public function requete5()
    {
        return null;
    }



}