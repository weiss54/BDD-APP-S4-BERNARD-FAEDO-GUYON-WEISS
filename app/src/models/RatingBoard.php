<?php

namespace app\models;

class RatingBoard extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $table = 'rating_board';
    protected $primaryKey = 'id';

    public function ratingsDelivre(){
        return $this->hasMany('app\models\game_rating', 'rating_board_id');
    }
    
}