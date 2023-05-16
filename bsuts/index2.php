<style type="text/css">
    .header{
        background-color: orange;
    }
</style>
<?php

include_once("config.php");


$result = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY id DESC");
?>

<html>
<head>
    <title>PELANGGAN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
<b>Data Pelanggan</b><br>
<a class="btn btn-primary" href="add.php" role="button">Tambah Pesanan</a><br/><br/>
<a class="btn btn-primary" href="index.php" role="button" >Home</a>

<table width='80%' border=1>

    <tr class="header">
        <th>No</th><th>Nama Pelanggan</th> <th>Tanggal</th> <th>Item</th><th>Harga</th> <th>Info</th>
    </tr>
    <?php
    $i=1;
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$user_data['nama_pelanggan']."</td>";
        echo "<td>".date('d/m/Y',strtotime($user_data['tanggal']) )."</td>";
        echo "<td>".$user_data['item']."</td>";
        echo "<td>".$user_data['harga']."</td>";
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
        $i++;
    }
    ?>
</table>
</body>

</html>