<?php
include 'functions.php';

// Select data for the id
$data = selectDataById();

// Check if form is submitted for updating data
if(isset($_POST['update'])){
    $id = intval($_POST['product_code']);
    $product_naam = $_POST['product_naam'];
    $prijs_per_stuk = $_POST['prijs_per_stuk'];
    $omschrijven = htmlspecialchars($_POST['omschrijving']);
    updateData($id, $product_naam, $prijs_per_stuk, $omschrijven);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post">
        <input type="hidden" name="product_code" value="<?php echo $data['product_code']; ?>">
        <input type="text" name="product_naam" value="<?php echo $data['product_naam']; ?>" required><br><br>
        <input type="number" name="prijs_per_stuk" value="<?php echo $data['prijs_per_stuk']; ?>" min="0" max="10000" required><br><br>
        <textarea name="omschrijving" value="<?php echo $data['omschrijving']; ?>" required></textarea><br><br>
        <input type="submit" name="update" value="Update Product">
    </form>
</body>
</html>
