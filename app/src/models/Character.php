<?php

namespace app\models;

class Character extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $table = 'character';
    protected $primaryKey = 'id';

    public function jeuxDuPersonnage() {
        return $this->belongsToMany('app\models\Game', 'game2character', 'character_id', 'game_id');
    }

    public function premierJeu(){
        return $this->belongsTo('app\models\Game', 'id');
    }
    
}