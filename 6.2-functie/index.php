<?php
include 'functions.php' ;

// selecteer en weergeef database
$data = selectData();

// database opslaan
if(isset($_POST['submit'])){
    $product_naam = $_POST['product_naam'];
    $prijs_per_stuk = $_POST['prijs_per_stuk'];
    $omschrijving = htmlspecialchars($_POST["omschrijving"]);
    insertData($product_naam, $prijs_per_stuk, $omschrijving);
    header("Location: index.php");
    exit();
}

// database verwijderen
if(isset($_GET['delete_product_code'])){
    $id = intval($_GET['delete_product_code']);
    deleteData($id);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
</head>
<body>
    <h1>Product toevoegen</h1>
    <form method="post">
        <input type="text" name="product_naam" placeholder="Product Naam" required><br><br>
        <input type="number" name="prijs_per_stuk" value="0" min="0" max="10000" required><br><br>
        <textarea name="omschrijving" placeholder="Product informatie" required></textarea><br>
        <input type="submit" name="submit" value="Product toevoegen">
    </form>
    <h1>Producten lijst</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Product naam</th>
            <th>Prijs per stuk</th>
            <th>Omschrijving</th>
            <th>Action</th>
        </tr>
        <?php foreach($data as $row){
            echo '<tr>';
            echo '<td>' . $row["product_code"] . '</td>';
            echo '<td>' . $row["product_naam"] . '</td>';
            echo '<td>' . $row["prijs_per_stuk"] . '</td>';
            echo '<td>' . $row["omschrijving"] . '</td>';
            echo '<td>';
            echo '<a href="edit.php?product_code=' . $row["product_code"] . '">Wijzigen</a> | ';
            echo '<a href="?delete_product_code=' . $row["product_code"] . '" onclick="return confirm(\'Weet je zeker dat je dit product wilt verwijderen?\')">Verwijderen</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>