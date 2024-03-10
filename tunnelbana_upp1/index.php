<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunnelbanna</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
    //En funktion för att innehålla arrayen med stationer
    //och skapa optioner för dropdown listan.
    $linje19 = ['Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan',
    'Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 'Thoridsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];
    function options($linje19){
        foreach($linje19 as $x){
            echo "<option value='$x'>$x</option>";
        }
    }


    //Här skapar jag formuläret och använder funktionen
    //jag skapade för att användaren ska välja stationer.
    echo '<form action="#" method="POST">
    <label for="Plats">Från:</label>
    <select name="Fran" id="Plats">
    <option value="">Välj en station...</option>';
    options($linje19);
    echo'</select><br>';

    echo '<label for="Destination">Till:</label>
    <select name="Till" id="Destination">
    <option value="">Välj en station...</option>';
    options($linje19);
    echo '</select>
    <input type="submit" name="send" value="Sök">
    </form>';


//När användaren trycker på knappen koden nedan kommer
//skapa två variabel som innehåller båda stationsnamnen.
    if(isset($_POST['send'])){
        $Fran = $_POST['Fran'];
        $Till = $_POST['Till'];
        //Sen letar jag efter vilken index är varje station på
        $IndexFran = array_search($Fran, $linje19);
        $IndexTill = array_search($Till, $linje19);

        $AntalStationer = $IndexTill - $IndexFran;
        //om vi får ett negativ tal ska den omvandlas till positiv med abs() funktion
        // för att räkna hela tiden med positiv tal och inte få någon fel
        if($AntalStationer < 0){
            $AntalStationer = -1 * $AntalStationer;//för att få värdet utan någon symbol
        }
        $Minuter = $AntalStationer * 3;
    //Här skriver jag ner resultat på tid mellan plats man ligger på
    // och destination. Jag skriver också hur mycket tid det tar
        echo "Du ska resa $AntalStationer stationer. <br> Totalt restid: $Minuter minuter.<br>";
        //Nu räknas tiden m.h.a funktion strtotime() där jag adderar tid
        //med variabeln minuter
        $tid = date('H:i a');
        $nytid = date('H:i a', strtotime("+{$Minuter} minutes"));
        echo "Ankomst vid $nytid";
    }
    ?>
</body>
</html>