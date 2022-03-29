<?php

namespace app\models;

class Platform extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'platform';
    protected $primaryKey = 'id';

    public function jeux() {
        return $this->belongsToMany('app\models\Game', 'game2platform', 'platform_id', 'game_id');
    }
    
}