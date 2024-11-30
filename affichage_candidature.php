<?php 
echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js\"></script>";
echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js\"></script>";
echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js\"></script>";



if (isset($candidat) && !(empty($candidat))) {
    echo "<style>
@import url('https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Bona+Nova+SC:ital,wght@0,400;0,700;1,400&family=Cormorant:ital,wght@0,300..700;1,300..700&family=Grey+Qo&family=Gwendolyn:wght@400;700&family=Lugrasimo&family=Luxurious+Script&family=Roboto:ital,wght@1,300&family=Sedan+SC&family=Tapestry&family=Updock&display=swap');
    .container  {
        display: flex;
    }
    .candidature-code p {
        color: #555;
    }
    .candidature-pre {
        font-family: \"Cormorant\", serif;
        font-size : 20px;
        color: #555;
        width: 60%;
    }
    .cont_all {
        display: flex;
        flex-direction: row;
    }
    .cont1, .cont2, .cont3 {
        margin: 10px;
    }
    .container3 img {
        border-radius: 30px;
        width: 80%;
        height: auto;
    }
</style>";

echo "<div class='container'>";
    echo "<div class='cont_all'>"; // cont_all start

        // cont1: Infos de la candidature
        echo "<div class='cont1'>";
            echo "<div class='candidature-code'>";
                 echo "<div class='container3'>";
                 echo "<h3>Nom :</h3><p>" . $candidat->cdt_nomCandidat . "</p>";
                 echo "<h3>Prénom :</h3><p>" . $candidat->cdt_prenomCandidat . "</p>";
                 echo '<img src="../../../documents/' .$candidat->cdt_image. '">';
                     echo "</div>";
                     echo "<br>";
            echo "</div>";
        echo "</div>"; // fin cont1

        // cont2: Présentation et documents
        echo "<div class='cont2'>";
            echo "<div class='candidature-code'>";
                echo "<h3>Présentation :</h3>";
                echo "<div class='candidature-pre'>";
                    echo "<p>" . $candidat->cdt_presentationCandidat . "</p>";
                echo "</div>";
                echo "<h3>Document(s) fourni(s):</h3>";
                if (!empty($documents) && is_array($documents)) {
                    foreach ($documents as $dt) {
                        echo "<a href=\"../../../documents/" . $dt['dct_chemin'] . "\">" . $dt['dct_nomDocument'] . "</a>";
                    }
                } else {
                    echo "<h4>Aucun document disponible pour cette candidature.</h4>";
                }
            echo "</div>";
        echo "</div>"; // fin cont2

        // cont3: Image
        echo "<div class='cont3'>";
        echo "<h3>Candidature :</h3><p>" . $candidat->cdt_codeCandidature . "</p>";
        echo "<h3>Catégorie visée:</h3><p>" . $candidat->cat_nomCategorie . "</p>";
        echo "<h3>État de la candidature :</h3><p>" . $candidat->cdt_activee . "</p>";
        echo "</div>"; // fin cont3

    echo "</div>"; // fin cont_all        

echo "</div>"; // fin container

} else {
    echo "<h3>";
    echo $titre;
    echo "</h3>";
}

/*echo "<a href=\"javascript:generatePDF()\" id=\"downloadButton\">Ici, pour télécharger un récapitulatif de la candidature</a>";

echo "<script> 
async function generatePDF() {
    document.getElementById('downloadButton').innerHTML = 'En cours de téléchargement, veuillez attendre...';
    
    var downloading = document.getElementById('container');
    var doc = new jsPDF('p', 'pt');
    
    // Utilisation de html2canvas pour prendre une capture du div avec id container
    await html2canvas(downloading, {
        allowTaint: true,
        useCORS: true,
        scale: 2 
    }).then((canvas) => {
        var imgData = canvas.toDataURL('image/png');
        doc.addImage(imgData, 'PNG', 10, 10, 580, 800); // Ajuster la taille de l'image ajoutée au PDF
    });
    
    doc.save('Document.pdf');
    document.getElementById('downloadButton').innerHTML = 'Ici, pour un récapitulatif de la candidature';
}
</script>";*/
?>

