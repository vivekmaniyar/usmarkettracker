<?php 

require_once 'database.php';

$cryptos=mysqli_query($conn, "SELECT * FROM cryptolist");
$stocks=mysqli_query($conn, "SELECT * FROM stocklist");


$_SESSION["apiKey"] = "3G3I4AW8Q66N8ZS0";

?>