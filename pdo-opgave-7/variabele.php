<?php
session_start();

// Haal de opgeslagen variabelen uit de SESSION
$naam = $_SESSION['naam'];
$email = $_SESSION['email'];

// Geef de variabelen weer
echo "Naam: $naam <br>";
echo "Email: $email";

echo '<a href="end_session.php" target="_blank"><button>End session</button><a/a>';
?>