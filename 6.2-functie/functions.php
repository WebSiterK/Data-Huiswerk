<?php
include 'dbconnect.php';

// Gegevens uit een database selecteren en weergeven
function selectData(){
    $conn = dbconnect();
    $stmt = $conn->prepare("SELECT * FROM producten ORDER BY product_code");
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

function selectDataById(){
    $conn = dbconnect();
    $id = intval($_GET['product_code']);
    $stmt = $conn->prepare("SELECT * FROM producten WHERE product_code = $id");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Gegevens in een database opslaan
function insertData($product_naam, $prijs_per_stuk, $omschrijving){
    $conn = dbconnect();
    $stmt = $conn->prepare("INSERT INTO producten (`product_naam`, `prijs_per_stuk`, `omschrijving`) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)");
    $stmt->bindParam(':product_naam', $product_naam);
    $stmt->bindParam(':prijs_per_stuk', $prijs_per_stuk);
    $stmt->bindParam(':omschrijving', $omschrijving);
    $stmt->execute();
}

// Gegevens in een database wijzigen
function updateData($id, $product_naam, $prijs_per_stuk, $omschrijving){
    $conn = dbconnect();
    $id = intval($_GET['product_code']);
    $stmt = $conn->prepare("UPDATE producten SET `product_naam` = :product_naam, `prijs_per_stuk` = :prijs_per_stuk, `omschrijving` = :omschrijving WHERE `product_code` = $id");
    $stmt->bindParam(':product_naam', $product_naam);
    $stmt->bindParam(':prijs_per_stuk', $prijs_per_stuk);
    $stmt->bindParam(':omschrijving', $omschrijving);
    $stmt->execute();
}

// Gegevens uit een database verwijderen
function deleteData($id){
    $conn = dbconnect();
    $stmt = $conn->prepare("DELETE FROM producten WHERE `product_code` = $id");
    $stmt->execute();
}
?>