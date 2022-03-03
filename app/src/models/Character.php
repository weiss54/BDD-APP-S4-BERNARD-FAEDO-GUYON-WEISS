<?php

namespace teezer\models;

class Character extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'character';
    protected $primaryKey = 'id';
    

    protected $id;
    protected $name;
    protected $real_name;
    protected $last_name;
    protected $alias;
    protected $birthday;
    protected $gender;
    protected $deck;
    protected $description;
    protected $first_appeared_in_game_id;
    protected $created_at;
    protected $updated_at;
    
    /*
    public function liste(){
        return $this->belongsTo('\models\liste', 'liste_id');
    }*/
    
}