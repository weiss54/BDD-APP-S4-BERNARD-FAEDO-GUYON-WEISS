<?php

namespace app\models;

class Company extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'company';
    protected $primaryKey = 'id';
    
    /*
    public function liste(){
        return $this->belongsTo('\models\liste', 'liste_id');
    }*/
    
}