<?php

namespace app\models;

class Character extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'character';
    protected $primaryKey = 'id';
    
    
    public function game(){
        return $this->belongsTo('\models\Game', 'id');
    }
    
}