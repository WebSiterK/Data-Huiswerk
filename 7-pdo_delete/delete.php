<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijderen Producten</title>
</head>
<body>
<?php
$product_code = $_GET['product_code'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "winkel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "DELETE FROM producten WHERE product_code = :product_code";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':product_code', $product_code);
    $stmt->execute();

    echo "Het product is succesvol verwijderd.";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$conn = null;
?>
</body>
</html>