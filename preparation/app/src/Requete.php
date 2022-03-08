<?php

namespace app;

use td2prep\models\Annonce;
use td2prep\models\Photo;


class Requete
{

    public function requete1() {
        return Photo::join('Annonce')->select('id')->where('Annonce.id', '=', '22')->get();
    }

    public function requete2() {
        return Photo::join('Annonce')->select('id')->where('Annonce.id', '=', '22', 'and','Photo.taille_octet', '>=', '100000')->get();
    }
}