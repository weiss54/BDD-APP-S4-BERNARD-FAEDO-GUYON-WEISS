<?php

namespace app;

use td2prep\models\Annonce;
use td2prep\models\Photo;


class Requete
{

    public function requete1()
    {
        return Photo::join('Annonce')->select('id')->where('Annonce.id', '=', '22')->get();
    }

    public function requete1v2()
    {
        $p = Annonce::find(22);
        return $p->photos()->get();
    }

    public function requete2()
    {
        return Photo::join('Annonce')->select('id')->where('Annonce.id', '=', '22', 'and', 'Photo.taille_octet', '>=', '100000')->get();
    }

    public function requete2v2()
    {
        $p = Annonce::find(22);
        return $p->photos()->where('taille_octet', '>', '100000')->get();
    }

    public function requete3() {
        return Photo::annonce()->groupeBy('count')->having('count', '>', '3')->get();
    }

    public function requete4()
    {
        return Photo::annonce()->where('taille_octet', '>', '100000')->get();
    }

}