<?php

namespace app;

use app\models\Game;
use app\models\Company;
use app\models\Platform;

use Illuminate\Database\Capsule\Manager as DB;

class RequeteTD_p2
{

    public function requete1() {
        $res = Game::select('name')->where('name', 'like', '%Mario%')->get();
        
        return $res;
        
    }

    public function requete2()
    {
        $jeu = Game::find(12342);
        $rq = $jeu->personnagesDuJeu()->get();
        return $rq;
    }

    PUBLIC function requete3(){
        $jeux = Game::select('name')->where('name', 'like', '%Mario%')->get();
        foreach ($jeux as $key => $value) {
            echo $value->personnagesPremierJeu();
        }

        return $res;
    }

    /*public function requete2(){
        return Company::select('name')->where('location_country', '=', 'Japan')->get();
    }

    public function requete3()
    {
        return Platform::select('name')->Where('install_base', '>=', '10000000')->get();
    }

    public function requete4()
    {
        return Game::select('name', 'id')->where('id', '>=', '21173')->limit(442)->get();
    }

    public function requete5()
    {
        return Game::select('name', 'deck')->limit(500)->get();
    }*/



}