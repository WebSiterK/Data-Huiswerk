<?php
session_start();
include 'dbconnect.php';

$query = "SELECT * FROM producten";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    foreach($result as $row) {
        echo "ID: " . $row["product_code"]. " - Product naam: " . $row["product_naam"]. " - Prijs_per_stuk: " . $row["prijs_per_stuk"]. " - Omschrijving: " . $row["omschrijving"]. "<br>";
        $_SESSION['selected_ids'][] = $row["product_code"];
    }
    echo '<a href="weergeven-ids.php" target="_blank"><button>Weergeven ids</button><a/>';

    echo '<a href="end_session.php" target="_blank"><button>End session</button><a/a>';

} else {
    echo "Geen resultaten gevonden";
}
$conn = null;
?>