<?php

namespace app\models;

class Theme extends \Illuminate\Database\Eloquent\Model{
    
    public $timestamps = false;

    protected $table = 'theme';
    protected $primaryKey = 'id';
}