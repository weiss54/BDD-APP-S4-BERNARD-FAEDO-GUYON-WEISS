<?php

namespace app\models;

class Comment extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $table = 'comment';
    protected $primaryKey = 'id';

}