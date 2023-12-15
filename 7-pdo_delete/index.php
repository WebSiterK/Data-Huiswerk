<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "winkel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM producten ORDER BY product_code";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo "<h2>Producten</h2>";
        echo "<ul>";
        foreach ($result as $row) {
            echo "<li>" . $row["product_naam"] . " - " . $row["prijs_per_stuk"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Geen producten gevonden.";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$conn = null;
?>

<a href="delete.php?product_code=2">Verwijder product</a>