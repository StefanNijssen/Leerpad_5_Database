<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "characters";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbinding met de database is succesvol tot stand gebracht.";

    $sql = "SELECT * FROM characters";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    } catch (PDOException $e) {
        die("Fout bij het verbinden met de database: " . $e->getMessage());
    }

?>