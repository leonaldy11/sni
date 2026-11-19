<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "seod5368_admin_sni";

#server
// $host = "localhost";
// $username = "seod5368_admin_sni";
// $password = "p.S@3P72eS";
// $dbname = "seod5368_admin_sni";


$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>