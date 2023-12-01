<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
</head>
<body>
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

// Deel 1: Hoe je alles selecteert in een query zonder variabele
$query1 = "SELECT * FROM producten";
$stmt1 = $conn->prepare($query1);
$stmt1->execute();
$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

if ($result1) {
    foreach ($result1 as $row) {
        echo "Product Code: " . $row["product_code"] . ", Naam: " . $row["product_naam"] . ", Prijs: " . $row["prijs_per_stuk"] . "<br>";
    }
} else {
    echo "Fout bij het uitvoeren van de query: " . $stmt1->errorInfo()[2];
}

// Deel 2: Hoe je een single row selecteert met placeholders
$query2 = "SELECT * FROM producten WHERE product_code = ?";
$productCode1 = 1;
$stmt2 = $conn->prepare($query2);
$stmt2->execute([$productCode1]);
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

if ($result2) {
    echo "<br>Product Code: " . $result2["product_code"] . ", Naam: " . $result2["product_naam"] . ", Prijs: " . $result2["prijs_per_stuk"] . "<br>";
} else {
    echo "Fout bij het uitvoeren van de query: " . $stmt2->errorInfo()[2];
}

// Deel 3: Hoe je een single row selecteert met named parameters
$query3 = "SELECT * FROM producten WHERE product_code = :productCode";
$productCode2 = 2;
$stmt3 = $conn->prepare($query3);
$stmt3->bindParam(":productCode", $productCode2, PDO::PARAM_INT);
$stmt3->execute();
$result3 = $stmt3->fetch(PDO::FETCH_ASSOC);

if ($result3) {
    echo "<br>Product Code: " . $result3["product_code"] . ", Naam: " . $result3["product_naam"] . ", Prijs: " . $result3["prijs_per_stuk"] . "<br>";
} else {
    echo "Fout bij het uitvoeren van de query: " . $stmt3->errorInfo()[2];
}

$conn = null;
?>
</body>
</html>