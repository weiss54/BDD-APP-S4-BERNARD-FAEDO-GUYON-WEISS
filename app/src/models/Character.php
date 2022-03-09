<?php

namespace app\models;

class Character extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $table = 'game';
    protected $primaryKey = 'id';

    public function jeuxDuPersonnage() {
        return $this->belongsToMany('app\models\Game', 'game2character', 'id', 'id');
    }

    public function premierJeu(){
        return $this->belongsTo('app\models\Game', 'id');
    }
    
}