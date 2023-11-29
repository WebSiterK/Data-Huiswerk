<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action= "#">
    <label for="product_naam">Product naam:</label><br>
    <input type="text" name="product_naam" placeholder="product naam"/><br>
    <label for="prijs_per_stuk">prijs per stuk:</label><br>
    <input type="number" name="prijs_per_stuk" min="1" max="10000" value="1"/><br>
    <label for="omschrijving">Omschrijving:</label><br>
    <textarea name="omschrijving" cols="25" rows="3"
          placeholder="Product omschrijving">
    </textarea><br>
    <input type = "submit" name="submit" value = "Toevoegen">
</form>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "winkel";
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to database ($dbname)";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
    if (isset($_POST['submit'])) {
    $product_naam = $_POST['product_naam'];
    $prijs_per_stuk = $_POST['prijs_per_stuk'];
    $omschrijving = $_POST['omschrijving'];

    try { 
    $stmt = $conn->prepare("INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)");
    $stmt->bindParam(':product_naam', $product_naam);
    $stmt->bindParam(':prijs_per_stuk', $prijs_per_stuk);
    $stmt->bindParam(':omschrijving', $omschrijving);
 
    $stmt->execute();
    echo "Product succesvol toegevoegd!";
    } 
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}
?>
</body>
</html>