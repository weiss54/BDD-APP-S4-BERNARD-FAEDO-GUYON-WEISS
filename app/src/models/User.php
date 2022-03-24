<?php

namespace app\models;

class User extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $table = 'user';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';


    public function commentairesUtilisateur() {
        return $this->hasMany('app\models\Comment', 'idUser');
    }

}