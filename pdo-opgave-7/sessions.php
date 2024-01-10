<?php
session_start();

// Definieer en geef waarden aan de variabelen
$naam = "Khaled";
$email = "2087587@talnet.nl";

// Sla de variabelen op in de SESSION
$_SESSION['naam'] = $naam;
$_SESSION['email'] = $email;
echo '<a href="variabele.php" target="_blank"><button>Laat me de sessie variabelen zien</button><a/>';
?>