<?php

namespace app\models;

class Game extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $table = 'game';
    protected $primaryKey = 'id';

    public function personnagesDuJeu() {
        return $this->belongsToMany('app\models\Character', 'game2character', 'game_id', 'character_id');
    }

    public function developpeursDuJeu(){
        return $this->belongsToMany('app\models\Company', 'game_developpers', 'game_id', 'comp_id');
    }

    public function personnagesPremierJeu(){
        return $this->hasMany('app\models\Character', 'first_appeared_in_game_id');
    }

    public function ratings(){
        return $this->belongsToMany('app\models\GameRating', 'game2rating', 'game_id', 'rating_id');
    }
}