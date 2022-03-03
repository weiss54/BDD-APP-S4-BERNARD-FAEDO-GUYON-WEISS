<?php

namespace app\models;

class Compagny extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'compagny';
    protected $primaryKey = 'id';
    
    /*
    public function liste(){
        return $this->belongsTo('\models\liste', 'liste_id');
    }*/
    
}