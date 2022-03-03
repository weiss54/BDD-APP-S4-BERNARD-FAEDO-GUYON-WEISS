<?php

namespace app\models;

class Genre extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'genre';
    protected $primaryKey = 'id';
    
    
}