<?php

namespace app;

use app\models\User;
use app\models\Comment;

use Illuminate\Database\Capsule\Manager as DB;

class RequeteTD_p2
{

    public function requete1($userId) {
        $res = Comment::where('idUser', '=', $userId)->sortBy('created_at')->get();
        foreach($res as $key => $value){
            echo $value->titre;
            echo $value->contenu;
            echo $value->created_at;
            echo '\n';
        }
    }

    public function requete2() {
        $res = User::select('email')->get();
        foreach($res as $key => $value){
            $compter = count(Comment::where('iduser', '=', $value)->get());
            if ($compter >= 5) {
                echo $value->nom.$value->prenom;
            }
        }
    }

    /*
    public function requete1() {
        $res = Game::select('name')->where('name', 'like', '%Mario%')->get();
        
    }

    public function requete2()
    {
        $jeu = Game::find(12342);
        $rq = $jeu->personnagesDuJeu()->get();
        foreach ($rq as $key => $value) {
            echo $value->name;
        };
    }

    public function requete3(){
        $jeux = Game::where('name', 'like', '%Mario%')->get();
        foreach ($jeux as $key => $jeu) {
            $personnages = $jeu->personnagesPremierJeu()->get();
            foreach($personnages as $key => $personnage) {
               echo $personnage->name . "\n";
            } 
        }
    }

    public function requete4(){
        $jeux = Game::select('name')->where('name', 'like', '%Mario%')->get();
        foreach ($jeux as $key => $jeu) {
            $personnages = $jeu->personnagesDuJeu()->get();
            foreach($personnages as $key => $personnage) {
               echo $personnage->name;
            } 
        }
    }

    public function requete5(){
        $companies = Company::select('name')->where('name', 'like', '%Sony%')->get();
        foreach ($companies as $key => $companie) {
            $jeux = $companie->jeuDeveloppeParLaCompany()->get();
            foreach($jeux as $key => $jeu) {
               echo $jeu->name;
            } 
        }
    }

    public function requete2(){
        return Company::select('name')->where('location_country', '=', 'Japan')->get();
    }

    public function requete3()
    {
        return Platform::select('name')->Where('install_base', '>=', '10000000')->get();
    }

    public function requete4()
    {
        return Game::select('name', 'id')->where('id', '>=', '21173')->limit(442)->get();
    }

    public function requete5()
    {
        return Game::select('name', 'deck')->limit(500)->get();
    }*/



}