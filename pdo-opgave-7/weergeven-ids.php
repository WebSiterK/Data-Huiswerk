<?php
session_start();

$selected_ids = $_SESSION['selected_ids'];

echo "Geselecteerde ID's: " . implode(", ", $selected_ids);
?>