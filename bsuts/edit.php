<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama_pelanggan= $_POST['nama_pelanggan'];
    $tanggal = $_POST['tanggal'];
    $item= $_POST['item'];
    $harga = $_POST['harga'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE barang SET nama_pelanggan='$nama_pelanggan',tanggal='$tanggal',item='$item',harga='$harga' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM barang WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama_pelanggan = $user_data['nama_pelanggan'];
    $tanggal = $user_data['tanggal'];
    $item= $user_data['item'];
    $harga = $user_data['harga'];
}
?>
<html>
<head>
    <title>Edit User Data</title>
</head>

<body>
<a href="index2.php">Home</a>
<br/><br/>

<form name="update_user" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Nama Pelanggan</td>
            <td><input type="text" name="nama_pelanggan" value=<?php echo $nama_pelanggan;?>></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="text" name="tanggal" value=<?php echo $tanggal;?>></td>
        </tr>
        <tr>
            <td>Item</td>
            <td><input type="text" name="item" value=<?php echo $item;?>></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>