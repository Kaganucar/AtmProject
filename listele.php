<?php 


    // En son paraların miktarlarını ekrana yazdıralım
    if (isset($_POST['paralistele'])) {

        $sqlSelectParalar = "SELECT * FROM kasetler";
        $stmtSelectParalar = $pdo->prepare($sqlSelectParalar);
        $stmtSelectParalar->execute();
        $paralar = $stmtSelectParalar->fetchAll(PDO::FETCH_ASSOC);
    
        echo "<br>Paraların Güncel Miktarları:<br>";
        foreach ($paralar as $para) {
            echo "{$para['paralar']} TL : {$para['miktar']} adet<br>";
        }
    }
    
    
    // Logları Listeleme
    $query1 = $pdo->prepare("SELECT * FROM loglar");
    $query1->execute();
    $data2 = $query1->fetchAll(PDO::FETCH_ASSOC);
    
    // ID secme
    $query2 = $pdo->prepare("SELECT * FROM kasetler");
    $query2->execute();
    $data3 = $query2->fetchAll(PDO::FETCH_ASSOC);
    
    if (isset($_POST['eklemeislemi'])) {
        $id = $_POST['id'];
        $yatirilan = $_POST['yatirilan'];
    
        $sorgu = $pdo->prepare("UPDATE kasetler SET miktar = miktar + :miktar WHERE id = :id");
        $sorgu->bindParam(':miktar', $yatirilan, PDO::PARAM_INT);
        $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $sonuc = $sorgu->execute();
    
        if ($sonuc) {
            header("Location: /deneme/indexa.php?sorgu=ok");
        } else {
            header("Location: /deneme/indexa.php?sorgu=no");
        }
    }
    



?>