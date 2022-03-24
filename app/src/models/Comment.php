<?php

namespace app\models;

class Comment extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = true;
    protected $table = 'comment';
    protected $primaryKey = 'id';

}