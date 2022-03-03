<?php

namespace app\models;

class Character extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'character';
    protected $primaryKey = 'id';
    
    /*
    public function liste(){
        return $this->belongsTo('\models\liste', 'liste_id');
    }*/
    
}