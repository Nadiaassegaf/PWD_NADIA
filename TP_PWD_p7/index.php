<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Perkalian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
echo "<h3>Menampilkan Bilangan Genap</h3>";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}
?>

<br><br>

<table>
    <tr>
        <th class="header">Bilangan</th>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<th class='header'>$i</th>";
        }
        ?>
    </tr>

    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo "<tr>";
        echo "<th class='header'>$i</th>";

        for ($j = 1; $j <= 10; $j++) {
            $hasil = $i * $j;

            if ($hasil % 2 == 0) {
                echo "<td class='genap'>$hasil</td>";
            } else {
                echo "<td class='ganjil'>$hasil</td>";
            }
        }

        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
