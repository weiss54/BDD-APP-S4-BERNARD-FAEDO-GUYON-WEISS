<?php

namespace td2prep\models;

class Photo extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'Annonce';
    protected $primaryKey = 'id';
    
    public function annonce() {
        return $this->belongsTo('td2prep\models\Annonce', 'id');
    }
   
    
}