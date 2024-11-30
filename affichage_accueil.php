

<?php


echo "<link href='https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Playfair+Display:wght@400;700&display=swap' rel='stylesheet'>";


echo "<div class='container mt-5'>";
echo "<h2 class='text-center mb-4' style='font-family: \"Playfair Display\", serif; color: #6a4e23; font-weight: 700;'>Actualités</h2>";

echo "<table class=\"table table-bordered table-hover\" style='background-color: #fff7e6;'>";
echo "<thead class='thead-light' style='font-family: \"Playfair Display\", serif; color: #6a4e23; font-weight: 700;'>";
echo "<tr>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 15%;'>Nouvelles du jour</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 20%;'>Date du jour</th>";
echo "<th class='text-center' style='background-color: #ffcc99; width: 15%;'>Auteur</th>";
echo "</tr>";
echo "</thead>";


 if (! empty($news) && is_array($news))
{
 
 foreach ($news as $act)
  {
        echo "<tbody>";
        echo "<tr style='background-color: #fff3e6; font-family: \"Merriweather\", serif; font-size: 0.95em; color: #6a4e23;'>";
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $act['act_texteActualites'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $act['act_date_actu'] . '</td>');
        echo ('<td class="text-center" style="text-shadow: 1px 1px 2px #d4b89c;">' . $act['cpt_nom'] . '</td>');
         echo "</tr>";
        echo "</tbody>";
    }
} else {
    echo "<tr><td colspan='8' class='text-center' style='background-color: #ffcc99; font-family: \"Playfair Display\", serif; font-size: 1.2em; color: #6a4e23;'><h4>Aucun actualité pour le moment.</h4></td></tr>";
}
echo "</table>";
echo "</div>";
?>
