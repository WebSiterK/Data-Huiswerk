<!DOCTYPE html>
<html>
<head>
    <title>GET Formulier</title>
</head>
<body>
    <form action="get.php" method="GET">
        <label for="naam">Naam:</label><br>
        <input type="text" name="naam" id="naam"><br><br>

        <label for="achternaam">Achternaam:</label><br>
        <input type="text" name="achternaam" id="achternaam"><br><br>

        <label for="leeftijd">Leeftijd:</label><br>
        <input type="number" name="leeftijd" id="leeftijd"><br><br>

        <label for="adres">Adres:</label><br>
        <input type="text" name="adres" id="adres"><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" name="email" id="email"><br><br>

        <input type="submit" value="Verzenden">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET["naam"]) && !empty($_GET["achternaam"]) && !empty($_GET["leeftijd"]) && !empty($_GET["adres"]) && !empty($_GET["email"])) {
            echo "<h2>Ingevoerde gegevens:</h2>";
            echo "Naam: " . $_GET["naam"] . "<br>";
            echo "Achternaam: " . $_GET["achternaam"] . "<br>";
            echo "Leeftijd: " . $_GET["leeftijd"] . "<br>";
            echo "Adres: " . $_GET["adres"] . "<br>";
            echo "Email: " . $_GET["email"] . "<br>";
            print_r($_GET);
        }
    }
    ?>
</body>
</html>
