<?php

namespace app\models;

class Game extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $table = 'game';
    protected $primaryKey = 'id';

    
    public function personnagesPremierJeu(){
        return $this->hasMany('\models\Character', 'first_appeared_in_game_id');
    }
}