<?php

namespace app;

use app\models\User;
use app\models\Comment;

use Illuminate\Database\Capsule\Manager as DB;

class RequeteTD_p2
{

    public function requete1($userId) {
        $res = Comment::where('emailUser', '=', $userId)->orderBy('created_at', 'asc')->get();
        foreach($res as $value){
            echo "\nTitre: ".$value->titre;
            echo "\nContenu: ".$value->contenu;
            echo "\nCreer le ".$value->created_at;
            echo "\n";
        }
    }

    public function requete2() {
        $res = Comment::select('emailUser')->groupBy('emailUser')->having(DB::raw('count(emailUser)'), '>=', '5')->get();
        foreach($res as $value){
                echo "\n- ".$value->emailUser;
        }
    }

}