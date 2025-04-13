<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // use your MySQL password
$dbname = 'student_app';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
