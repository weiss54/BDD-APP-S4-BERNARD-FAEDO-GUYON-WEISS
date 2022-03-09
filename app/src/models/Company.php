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

    public function jeuDeveloppeParLaCompany(){
        return $this->belongsToMany('app\models\Game', 'game_developpers', 'comp_id', 'game_id');
    }
    
}