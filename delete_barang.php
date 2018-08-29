<?php
//connection
$conection = new mysqli("localhost", "root", "", "db_toko");
// Check connection
if ($conection->connect_error) {
    die("Connection failed: " . $conection->connect_error);
} 

$id = $_GET['id'];
$sql = "DELETE FROM barang WHERE barangId='$id'";

if ($conection->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conection->error;
}

header("Location: barang.php");
?>