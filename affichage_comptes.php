<?php


echo "<link href='https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Playfair+Display:wght@400;700&display=swap' rel='stylesheet'>";


echo "<div class='container mt-5'>";
echo "<h2 class='text-center mb-4' style='font-family: \"Playfair Display\", serif; color: #6a4e23; font-weight: 700;'>Comptes</h2>";
echo ("<a href=\"https://obiwan.univ-brest.fr/~e22003818/index.php/compte/creer\"><img src=\"https://obiwan.univ-brest.fr/~e22003818/bootstrap/img/add.gif\" alt=\"img\" width=\"64\" height=\"64\" style=\"float: right; margin-left: 20px;\"></a>".'</td>');

echo "<table class=\"table table-bordered table-hover\" style='background-color: #fff7e6;'>";
echo "<thead class='thead-light' style='font-family: \"Playfair Display\", serif; color: #6a4e23; font-weight: 700;'>";
echo "<tr>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 15%;'>Nom</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 20%;'>Prénom</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 15%;'>E-mail</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 10%;'>État du compte</th>";
echo "</tr>";
echo "</thead>";

if (! empty($logins) && is_array($logins))
{
 
 foreach ($logins as $pseudos)
  {
        echo "<tbody>";
        echo "<tr style='background-color: #fff3e6; font-family: \"Merriweather\", serif; font-size: 0.95em; color: #6a4e23;'>";        
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $pseudos['cpt_nom'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $pseudos['cpt_prenom'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $pseudos['cpt_email'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $pseudos['cpt_etat'] . '</td>');

   }
        echo "</tr>";
        echo "</tbody>";
    }
     else {
    echo "<tr><td colspan='8' class='text-center' style='background-color: #ffcc99; font-family: \"Playfair Display\", serif; font-size: 1.2em; color: #6a4e23;'><h4>Aucun concours disponible pour le moment.</h4></td></tr>";
}
echo "</table>";
echo "</div>";



?>


