<?php

namespace app;

use td2prep\models\Annonce;
use td2prep\models\Photo;


class Requete
{

    public function requete1() {
        return Annonce::find(22)->photos()->get();
    }

    public function requete2() {
        return Annonce::find(22)->photos()->where('taille_octet', '>', '100000')->get();
    }

    public function requete3() {
        $annonces = Annonce::has('photos', '>', '3')->get();
        return $annonces;
    }

    public function requete4() {
        return Annonce::whereAs('photos', function($q){
            $q->where('taille_octet', '>', 100000);
        })->get();
    }

}