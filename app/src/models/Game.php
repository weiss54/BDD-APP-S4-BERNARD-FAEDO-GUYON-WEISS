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
        return $this->belongsToMany('app\models\Company', 'game_developers', 'game_id', 'comp_id');
    }

    public function personnagesPremierJeu(){
        return $this->hasMany('app\models\Character', 'first_appeared_in_game_id');
    }

    public function ratings(){
        return $this->belongsToMany('app\models\GameRating', 'game2rating', 'game_id', 'rating_id');
    }

    public function genres() {
        return $this->belongsToMany('app\models\Genre', 'game2genre', 'game_id', 'genre_id');
    }
    
    public function publieursDuJeu(){
        return $this->belongsToMany('app\models\Company', 'game_publishers', 'game_id', 'comp_id');
    }

    public function plateformes() {
        return $this->belongsToMany('app\models\Platform', 'game2platform', 'game_id', 'platform_id');
    }
}