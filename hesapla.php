<?php

if (isset($_POST['cekmeislemi'])) {
    $sayi = $_POST["cekilenmiktar"];
    if (!is_numeric(htmlspecialchars($sayi)) || $sayi < 0 || $sayi % 5 !== 0) {
        echo "Geçerli sayı giriniz";
    }
}


function hesapla($pdo, $sayi)
{
    $query = $pdo->prepare("SELECT paralar FROM kasetler ORDER BY id DESC");
    $query->execute();
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $values = array_column($res, 'paralar');

    $kalan = $sayi;

    foreach ($values as $banknot) {
        $adet = floor($kalan / $banknot);

        if ($adet > 0) {
            $query = $pdo->prepare("SELECT miktar FROM kasetler WHERE paralar = :paralar");
            $query->bindParam(':paralar', $banknot, PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);

            $miktar = $data['miktar'];

            // Eğer çekilecek miktar, mevcut miktarı aşıyorsa miktarı negatif yapma
            if ($adet > $miktar) {
                $adet = $miktar;
            }

            $sqlUpdate = "UPDATE kasetler SET miktar = miktar - :adet WHERE paralar = :banknot";
            $stmtUpdate = $pdo->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':adet', $adet, PDO::PARAM_INT);
            $stmtUpdate->bindParam(':banknot', $banknot, PDO::PARAM_INT);
            $stmtUpdate->execute();

            if ($adet) {
                echo "$adet adet $banknot TL verilmiştir.<br>";
            } else {
                echo "Kasada $banknot TL Kalmamıştır.<br>";
            }
            $kalan -= $adet * $banknot;
        }
    }

    //Girilen Değer Kasadaki paradan fazla ise
    if ($sayi > $kalan) {
        if ($adet >= $kalan) {
            $query = $pdo->prepare("INSERT INTO loglar SET para = :para");
            $query->bindParam(":para", $sayi, PDO::PARAM_INT);
            $data = $query->execute();
            echo "İstenilen Miktar: $sayi TL Verildi.<br>";
        } else {
            $verilenMiktar = $sayi - $kalan;
            $query = $pdo->prepare("INSERT INTO loglar SET para = :para");
            $query->bindParam(":para", $verilenMiktar, PDO::PARAM_INT);
            $data = $query->execute();
            echo "İstenilen miktar verilemedi yerine $verilenMiktar verildi.<br>";
        }
    }
    hesapla($pdo, $sayi);
}
