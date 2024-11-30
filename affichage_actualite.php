Contenu de la page d'accueil !!


<h1><?php echo $titre;?></h1><br />
<?php

echo "<table class=\"table table-bordered\"> <th>Nouvelles Actualités</th> <th>Date</th> <th>Auteur</th> ";

if (isset($news))
{
    
        echo "<tr>";
        echo (' <td> '. $news->act_texteActualites .' </td> '.' <td> '. $news->act_date_actu.' </td> '.' <td> '.$news->cpt_idCompte . ' </td> ');
        echo "</tr>";


}
else
{
    echo ("Aucune actualité pour l'instant");
}
echo "</table>";
?>