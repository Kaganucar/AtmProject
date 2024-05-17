<?php
include 'ayar.php';
include 'hesapla.php';
include 'listele.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .kagan {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        form {
            margin-top: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            padding: 5px;
        }

        button {
            padding: 8px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php if (isset($_GET['sorgu'])) {
        if ($_GET['sorgu'] == "ok") {
            echo "<h5 style='color: green;'>İşlem başarıyla sağlandı</h5>";
        } else {
            echo "<h5 style='color: red;'>İşlem başarısız</h5>";
        }
    } ?>
    <div class="kagan">
        <form action="" method="POST">
            <label>Çekmek İstediğiniz Miktarı Girin:</label>
            <input type="number" name="cekilenmiktar" id="cekilenmiktar" min="5" step="5" required>
            <button type="submit" name="cekmeislemi">Para Çek</button>
        </form>
    </div>
    <div class="kagan">
        <form action="" method="POST">
            <label>Kasaya Para Ekle:</label>
            <select name="id">
                <?php foreach ($data3 as $key => $val) { ?>
                    <option value="<?php echo $val['id'] ?>"><?php echo $val['paralar'] ?></option>
                <?php } ?>
            </select>
            <input type="number" name="yatirilan" min="1" required>
            <button type="submit" name="eklemeislemi">Para Ekle</button>
        </form>
    </div>

    <div class="kagan">
        <form action="" method="POST">
            <label>Kasada Bulunan Paralar</label>
            <button type="submit" name="paralistele">Para Listele</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarih</th>
                <th>Para</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data2 as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['tarih'] ?></td>
                    <td><?php echo $value['para'] ?></td>
                </tr>
            <?php  }
            ?>
        </tbody>
    </table>

</body>

</html>