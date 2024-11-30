<?php
namespace App\Controllers;
use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;

class Concours extends BaseController
    {
    public function __construct()
    {
        helper('form');
        $this->model = model(Db_model::class);
    }
    
    public function afficher_crs()
    {
       // $model = model(Db_model::class);
        $data['concours'] = $this->model->get_concours();

        return view('templates/haut')
        .view('menu_visiteur')
        .view('affichage_concours',$data)
        .view('templates/bas');
      
    }

    public function details($id = null)
    {
        if(!$id)
        {
            $data['titre'] = "Veuillez entrez une candidature de 20 caractères dans l'URL";
    
        } 
        else{ 
            $data['parametre_url'] = ($id);
            $data['crs'] = $this->model -> details_concours($id);
        }
       
        return view('templates/haut')
        .view('menu_visiteur')
        .view('affichage_detailsCRS',$data)
        .view('templates/bas');
 
     }


    
}