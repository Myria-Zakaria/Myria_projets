<?php


echo "<link href='https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Playfair+Display:wght@400;700&display=swap' rel='stylesheet'>";

echo "<style>
    table tr td:last-child {
        border: none;
    }
</style>";

echo "<div class='container mt-5'>";
echo "<h2 class='text-center mb-4' style='font-family: \"Playfair Display\", serif; color: #6a4e23; font-weight: 700;'>Concours de Pâtisserie</h2>";
echo "<p class='text-center mb-5' style='font-family: \"Merriweather\", serif; color: #a67c52; font-size: 1.2em;'>Participez à nos concours de pâtisserie et montrez vos talents !</p>";

echo "<table class=\"table table-bordered table-hover\" style='background-color: #fff7e6;'>";
echo "<thead class='thead-light' style='font-family: \"Playfair Display\", serif; color: #6a4e23; font-weight: 700;'>";
echo "<tr>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 15%;'>Nom du Concours</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 20%;'>Introduction</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 15%;'>Arènes de Maîtrise</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 10%;'>Commencement</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 15%;'>Repères Clès</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 10%;'>État du Concours</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 10%;'>Maestro de la Compétition</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 15%;'>Le Cercle des Experts</th>";
echo "</tr>";
echo "</thead>";

if (!empty($concours) && is_array($concours)) {
    foreach ($concours as $crs) {
        echo "<tbody>";
        echo "<tr style='background-color: #fff3e6; font-family: \"Merriweather\", serif; font-size: 0.95em; color: #6a4e23;'>";        
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">'.'<a href="details/'. $crs['crs_idConcours'].'">'.$crs['crs_nomConcours'] . '</a>' .
        '</td>');
            echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $crs['intro'] . '</td>');
        if($crs['cat_nom']==false)
        {
         $crs['cat_nom'] =  "Aucune catégorie n'a été choisie pour le moment";
         echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $crs['cat_nom'] . '</td>');
        }
        else
        {
            echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $crs['cat_nom'] . '</td>');
 
        }

        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $crs['dtb'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $crs['dates'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $crs['phase_concours'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $crs['orga'] . '</td>');
       if($crs['jry']==false)
       {
        $crs['jry'] =  "Aucun jury n'a été désigné pour l'instant";
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $crs['jry'] . '</td>');
       }
       else
       {
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $crs['jry'] . '</td>');

       }

       if ($crs['phase_concours'] == 'Concours à venir') {
        echo "<td class=\"text-center\" style=\"text-shadow: 1px 1px 2px #d4b89c;\">";
        echo '<img src="../../documents/loupe.gif" width="64" height="64" style="display: block; margin: auto;">';
        echo "</td>";
    } else if ($crs['phase_concours'] == 'Candidature Ouverte') {
        echo "<td class=\"text-center\" style=\"text-shadow: 1px 1px 2px #d4b89c;\">";
        echo '<img src="../../documents/editer.gif" width="64" height="64" style="display: block; margin: auto;">';
        echo "</td>";
    } else {
        echo "<td class=\"text-center\" style=\"text-shadow: 1px 1px 2px #d4b89c;\">";
        echo '<img src="../../documents/gagner.gif" width="64" height="64" style="display: block; margin: auto;">';
        echo "</td>";
    }
    
        echo "</tr>";
        echo "</tbody>";
    }
} else {
    echo "<tr><td colspan='8' class='text-center' style='background-color: #ffcc99; font-family: \"Playfair Display\", serif; font-size: 1.2em; color: #6a4e23;'><h4>Aucun concours disponible pour le moment.</h4></td></tr>";
}
echo "</table>";
echo "</div>";
?>
