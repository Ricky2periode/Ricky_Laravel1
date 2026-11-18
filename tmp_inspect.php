<?php
try {
    $dbh = new PDO("mysql:host=127.0.0.1;dbname=db_penjualan;charset=utf8mb4", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $stmt = $dbh->query("SHOW COLUMNS FROM produk");
    foreach ($stmt as $row) {
        echo $row["Field"] . " " . $row["Type"] . " " . $row["Null"] . " " . $row["Key"] . " " . $row["Default"] . PHP_EOL;
    }
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage() . PHP_EOL;
}
?>

