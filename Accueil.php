<?php

namespace App\Controllers;

use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;

class Accueil extends BaseController
{
    public function afficher()
    {
        // $data['parametre_url'] = ($donnee);
        $model = model(Db_model ::class);
        $data['news'] = $model -> get_actualite();

        return view('templates/haut')
        .view('menu_visiteur')
        .view('affichage_accueil',$data)
        .view('templates/bas');
 
 }
}

?>
