<?php

namespace App\Models;
use CodeIgniter\Model;

class Db_model extends Model 
{
protected $db ; 
    public function __construct()
    {
    $this->db = db_connect(); //charger la base de données
    // ou
    // $this->db = \Config\Database::connect();
    }
    public function get_all_compte()    
    {
        $resultat = $this->db->query("SELECT cpt_nom,cpt_prenom,cpt_email,cpt_etat FROM t_compte_cpt ORDER BY cpt_etat;");
        return $resultat->getResultArray();
    }

   /* public function get_act($numero)    {
    $requete="SELECT * FROM t_actualites_act WHERE act_idActualites=".$numero.";";
    $resultat = $this->db->query($requete);
    return $resultat->getRow();  }*/

    public function get_actualite()
    {
        $req = $this->db->query("SELECT act_texteActualites,act_date_actu,cpt_nom from t_actualites_act  JOIN t_compte_cpt USING(cpt_idCompte) WHERE act_etat = 'A' ORDER BY act_date_actu DESC LIMIT 5;;");
        return $req->getResultArray();

    }

    public function get_nbcompte()
    {
            $resultat=$this->db->query("SELECT COUNT(*) as nb_Comptes FROM t_compte_cpt;");
             return $resultat->getRow();
    }

    public function get_concours()
    {
            $crs = $this->db->query("SELECT crs.crs_idConcours AS crs_idConcours, crs.crs_nomConcours AS crs_nomConcours, crs.crs_intro AS intro,crs.crs_dateDebut AS dtb ,get_dates(crs.crs_idConcours) AS dates,
            etat_concours(crs.crs_idConcours) AS phase_concours,cat.cat_nomCategorie AS cat_nom, get_admin(crs.crs_idConcours) AS orga,get_jry(crs.crs_idConcours) AS jry
            FROM t_concours_crs AS crs
            LEFT JOIN t_liaison_lia AS lia ON crs.crs_idConcours = lia.crs_idConcours
            LEFT JOIN t_compte_jry AS jry ON lia.cpt_idCompte = jry.cpt_idCompte
            LEFT JOIN t_compte_cpt AS cpt ON jry.cpt_idCompte = cpt.cpt_idCompte
            LEFT JOIN t_possede_pos  AS pos ON  crs.crs_idConcours = pos.crs_idConcours 
            LEFT JOIN t_categorie_cat  AS cat ON pos.cat_idCategorie = cat.cat_idCategorie
            GROUP BY crs.crs_idConcours
            ORDER BY crs.crs_dateDebut DESC;");
            return $crs->getResultArray();
    }

    public function details_concours($id)
    {
            $crs = $this->db->query("SELECT crs.crs_idConcours AS crs_idConcours, crs.crs_nomConcours AS crs_nomConcours, crs.crs_intro AS intro,crs.crs_dateDebut AS dtb ,get_dates(crs.crs_idConcours) AS dates,
            etat_concours(crs.crs_idConcours) AS phase_concours,GROUP_CONCAT(cat.cat_nomCategorie) AS cat_nom, get_admin(crs.crs_idConcours) AS orga,get_jry(crs.crs_idConcours) AS jry
            FROM t_concours_crs AS crs
            LEFT JOIN t_liaison_lia AS lia ON crs.crs_idConcours = lia.crs_idConcours
            LEFT JOIN t_compte_jry AS jry ON lia.cpt_idCompte = jry.cpt_idCompte
            LEFT JOIN t_compte_cpt AS cpt ON jry.cpt_idCompte = cpt.cpt_idCompte
            LEFT JOIN t_possede_pos  AS pos ON  crs.crs_idConcours = pos.crs_idConcours 
            LEFT JOIN t_categorie_cat  AS cat ON pos.cat_idCategorie = cat.cat_idCategorie
            WHERE crs.crs_idConcours ='" .$id. "';");
                        return $crs->getResultArray();

    }


    public function set_compte($saisie)
    {
        //Récuparation (+ traitement si nécessaire) des données du formulaire
        $login=$saisie['pseudo'];
        $mot_de_passe=$saisie['mdp'];
        $nom=$saisie['lastName'];
        $prenom=$saisie['firstName'];

        $sql="INSERT INTO t_compte_cpt(cpt_nom,cpt_prenom,cpt_email,cpt_mdp,cpt_etat) VALUES('".$nom."','".$prenom."','".$login."','".$mot_de_passe."','A');";
        return $this->db->query($sql);

       
    }
    public function get_candidature($id)
    {
        $cdt=("SELECT cdt_codeId,cdt_codeCandidature,cdt_nomCandidat,cdt_prenomCandidat,cdt_presentationCandidat,cdt_image,cat_nomCategorie,cdt_activee FROM t_candidature_cdt
        JOIN t_document_dct USING (cdt_idCandidature)
        JOIN t_categorie_cat USING(cat_idCategorie)
        WHERE cdt_codeCandidature='" .$id. "';");
        $res = $this->db->query($cdt);
        return $res->getRow();
    }

    public function get_docs($id)
    {
        $cdt=("SELECT dct_nomDocument , dct_chemin,dct_idDocument FROM t_document_dct
        JOIN t_candidature_cdt USING (cdt_idCandidature)
        WHERE cdt_codeCandidature ='" .$id. "';");
        $res = $this->db->query($cdt);
        return $res->getResultArray();

    }

    public function connect_compte($u,$p)
   {
        $sql="SELECT cpt_email,cpt_mdp
          FROM t_compte_cpt
          WHERE cpt_email='".$u."'
          AND cpt_mdp='".$p."';";
        $resultat=$this->db->query($sql);
        if($resultat->getNumRows() > 0)  
        {  
          return true;  
        }  
        else  
        {  
          return false;
        }  
   }

}
