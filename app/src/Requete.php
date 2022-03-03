<?php

namespace app;

use app\models\Game;
use app\models\Compagny;

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
        return null;
    }

    public function requete4()
    {
        return null;
    }

    public function requete5()
    {
        return null;
}



}