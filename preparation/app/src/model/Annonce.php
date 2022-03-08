<?php

namespace td2prep\models;

class Annonce extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'Annonce';
    protected $primaryKey = 'id';
    
    
    public function photos() {
        return $this->hasMany('td2prep\models\Photo', 'id'); //Dans ce cas là on utilisera hasMany
    }
    
}