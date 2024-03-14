<?php
$servername = 'localhost';
$username = 'root';
$password ='';
$conn = new PDO("mysql:host=$servername;dbname=gsb_bd", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>