<?php


echo "<link href='https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Playfair+Display:wght@400;700&display=swap' rel='stylesheet'>";

echo "<style>
    table tr td:last-child {
        border: none;
    }
</style>";


if (!empty($crs) && is_array($crs)) {

    foreach ($crs as $ccr) {

        echo "<h2 class='text-center mb-4' style='font-family: \"Playfair Display\", serif; color: #6a4e23; font-weight: 700;'>" . $ccr['crs_nomConcours'] . "</h2>";
            echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $ccr['intro'] . '</td>');
        if($ccr['cat_nom']==false)
        {
         $ccr['cat_nom'] =  "Aucune catégorie n'a été choisie pour le moment";
         echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $ccr['cat_nom'] . '</td>');
        }
        else
        {
            echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $ccr['cat_nom'] . '</td>');
 
        }

        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $ccr['dtb'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $ccr['dates'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $ccr['phase_concours'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $ccr['orga'] . '</td>');
       if($ccr['jry']==false)
       {
        $ccr['jry'] =  "Aucun jury n'a été désigné pour l'instant";
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $ccr['jry'] . '</td>');
       }
       else
       {
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $ccr['jry'] . '</td>');

       }

    }
} else {
    echo "<tr><td colspan='8' class='text-center' style='background-color: #ffcc99; font-family: \"Playfair Display\", serif; font-size: 1.2em; color: #6a4e23;'><h4>Aucun concours disponible pour le moment.</h4></td></tr>";
}
echo "</table>";
echo "</div>";
?>
