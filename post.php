<!DOCTYPE html>
<html>
<head>
    <title>POST Formulier</title>
</head>
<body>
    <form action="#" method="POST">
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["naam"]) && !empty($_POST["achternaam"]) && !empty($_POST["leeftijd"]) && !empty($_POST["adres"]) && !empty($_POST["email"])) {
            echo "<h2>Ingevoerde gegevens:</h2>";
            echo "Naam: " . $_POST["naam"] . "<br>";
            echo "Achternaam: " . $_POST["achternaam"] . "<br>";
            echo "Leeftijd: " . $_POST["leeftijd"] . "<br>";
            echo "Adres: " . $_POST["adres"] . "<br>";
            echo "Email: " . $_POST["email"] . "<br>";
            print_r($_POST);
        }
    }
    ?>
</body>
</html>
