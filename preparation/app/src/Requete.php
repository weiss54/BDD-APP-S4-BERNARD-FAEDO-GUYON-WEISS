namespace app;

use app\models\Annonce;
use app\models\Photo;


class Requete
{

    public function requete1() {
        return Game::select('name')->where('name', 'like', '%Mario%')->get();
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
    }
}