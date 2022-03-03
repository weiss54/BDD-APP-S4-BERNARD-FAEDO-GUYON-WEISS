<?php

namespace app\models;

class Friends extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'character';
    protected $primaryKey = ['char1_id', 'char2_id'];

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('char1_id', '=', $this->getAttribute('char1_id'))
            ->where('char2_id', '=', $this->getAttribute('char2_id'));

        return $query;
    }

    
    
    
    /*
    public function liste(){
        return $this->belongsTo('\models\liste', 'liste_id');
    }*/
    
}