<?php

namespace app\models;

class GameRating extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $table = 'game_rating';
    protected $primaryKey = 'id';

    public function jeux() {
        return $this->belongsToMany('app\models\Game', 'game2rating', 'rating_id', 'game_id');
    }

    public function ratingBoard(){
        return $this->belongsTo('app\models\RatingBoard', 'id');
    }

}