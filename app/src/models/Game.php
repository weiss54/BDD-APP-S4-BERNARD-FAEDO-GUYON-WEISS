<?php

namespace app\models;

class Game extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $table = 'game';
    protected $primaryKey = 'id';

    public function personnagesDuJeu() {
        return $this->belongsToMany('app\models\Character', 'game2character', 'id', 'id');
    }

}