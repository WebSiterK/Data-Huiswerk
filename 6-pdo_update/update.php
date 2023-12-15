<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Productinformatie</title>
</head>
<body>
 
<h2>Productinformatie bijwerken</h2>
 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="product_naam">Product code:</label>
    <input type="number" name="product_code"><br>
    <label for="product_naam">Product naam:</label>
    <input type="text" name="product_naam"><br>
    <label for="prijs_per_stuk">Prijs per stuk:</label>
    <input type="text" name="prijs_per_stuk"><br>
    <label for="omschrijving">Omschrijving:</label>
    <textarea name="omschrijving"></textarea><br>
    <input type="submit" value="Bijwerken">
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "winkel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to database ($dbname)<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["product_code"];
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    $stmt = $conn->prepare("UPDATE producten SET product_naam=:product_naam, prijs_per_stuk=:prijs_per_stuk, omschrijving=:omschrijving WHERE product_code= $id");
    $stmt->bindParam(':product_naam', $product_naam);
    $stmt->bindParam(':prijs_per_stuk', $prijs_per_stuk);
    $stmt->bindParam(':omschrijving', $omschrijving);
 
    $stmt->execute();
 
    echo "Productinformatie bijgewerkt!";
}

$conn = null;
?>
</body>
</html>
 