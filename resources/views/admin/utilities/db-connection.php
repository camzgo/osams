<?php

$hostname = "localhost";
$username ="root";
$password = "";
$database = "osams";
$connection = mysqli_connect($hostname, $username, $password, $database);
if(!$connection){
    die("Connection Failed:".mysqli_connect_error());
}

 $date = date("Y-m-d");
mysqli_query($connection, "INSERT INTO backup_tbl (backup_date) VALUES ('$date')");

exec("D:/xampp/mysql/bin/mysqldump -u root osams > D:/xampp/htdocs/osams" . mysqlI_insert_id($connection) . ".sql");

// header("location: util_backup.php");
?>