<?php

namespace app\models;

class Genre extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $table = 'genre';
    protected $primaryKey = 'id';

    public function jeux() {
        return $this->belongsToMany('app\models\Game', 'game2genre', 'genre_id', 'game_id');
    }

}