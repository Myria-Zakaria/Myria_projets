<?php

namespace App\Controllers;

use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;

class Candidature extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model = model(Db_model::class);
    }

    public function trouver($code_id=0,$code_cdt = 0)
    {
         $data['titre']='Veuillez entrez vos identifiants';
         if ($this->request->getMethod()=="post"){
             if (! $this->validate([
                 'code_id' => 'required',
                 'code_cdt' => 'required'
             ],[ 
                    'code_id' => [
                    'required' => 'Veuillez entrer le code qui vous a été fourni composé de 8 caractères ',
                    ],
                    'code_cdt' => [
                        'required' => 'Veuillez entrer le code qui vous a été fourni composé de 20 caractères ',
                    ],
             ]))
             { 
                return view('templates/haut')
                . view('menu_visiteur')
                . view('afficher_cdt',$data)
                . view('templates/bas');
             }

             $id=$this->request->getVar('code_id');
             $cd=$this->request->getVar('code_cdt');
           
             $candidat=  $this->model->get_candidature($id,$cd);

            if( $candidat){
               $data['documents'] = $this->model->get_docs($cd);
               $data['candidat'] =  $candidat;
               return view('templates/haut', $data)
               . view('menu_visiteur')
               . view('affichage_candidature', $data)
               . view('templates/bas');

            }else{
                $data['titre'] = "Aucune candidature et documents ne sont associés à ce code. Veuillez réessayer.";
                return view('templates/haut',$data)
                . view('menu_visiteur')
                . view('afficher_cdt',$data)
                . view('templates/bas'); 
            }
                } 
                return view('templates/haut', $data)
                . view('menu_visiteur')
                . view('afficher_cdt', $data)
                . view('templates/bas'); 
        }




}

?>
