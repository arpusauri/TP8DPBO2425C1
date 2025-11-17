<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "tp_mvc25";

$db = new mysqli($servername, $username, $password, $db_name);

if ($db->connect_error) {
    die("Connection failed" . $conn->connect_error);
};