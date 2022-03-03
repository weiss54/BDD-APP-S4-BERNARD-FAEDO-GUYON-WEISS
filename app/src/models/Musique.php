<?php

namespace teezer\models;

class Musique extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'musique';
    protected $primaryKey = 'idMusique';
    

    protected $idMusique;
    protected $nomMusique;
    protected $genre;
    protected $annee;
    protected $titreMusique;
    protected $nomArtiste;
    
    /*
    public function liste(){
        return $this->belongsTo('\models\liste', 'liste_id');
    }*/
    
}