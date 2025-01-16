<?php
$servername = "localhost";
$username = "root"; // utilizator implicit în XAMPP
$password = ""; // fără parolă implicit
$dbname = "login_system"; // numele bazei de date

// Conexiune MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifică conexiunea
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}
?>
