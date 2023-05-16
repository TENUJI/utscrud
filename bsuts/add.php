<html>
<head>
    <title>Add Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
</head>

<body>
<a href="index.php">Go to Home</a>
<br/><br/>

<form action="add.php" method="post" name="form1">
    <table width="25%" border="0">
        <tr>
            <td>Nama Pelanggan</td>
            <td><input type="text" name="nama_pelanggan"></td>
        </tr>
        <tr>
            <td>Tanggal Pemesanan</td>
            <td><input type="text" name="tanggal"></td>
        </tr>
        <tr>
            <td>Item</td>
            <td><input type="text" name="item"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>

<?php

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
    $nama_pelanggan= $_POST['nama_pelanggan'];
    $tanggal = $_POST['tanggal'];
    $item= $_POST['item'];
    $harga = $_POST['harga'];

    // include database connection file
    include_once("config.php");

    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO barang(nama_pelanggan,tanggal,item,harga) VALUES('$nama_pelanggan','$tanggal','$item','$harga')");

    // Show message when user added
    echo "User added successfully. <a href='index.php'>View Item</a>";
}
?>
</body>
</html>