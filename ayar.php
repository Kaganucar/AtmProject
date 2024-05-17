<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "atmdbdeneme";
    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch (PDOException $e) {
        echo "Bağlantı hatası: " . $e->getMessage();
    }
?>
