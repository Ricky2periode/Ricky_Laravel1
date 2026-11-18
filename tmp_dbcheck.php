<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=db_penjualan;charset=utf8mb4', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $stmt = $dbh->query('SHOW COLUMNS FROM produk');
    echo "COLUMNS:\n";
    foreach ($stmt as $row) {
        echo $row['Field'] . ' ' . $row['Type'] . ' ' . $row['Null'] . ' ' . $row['Key'] . ' ' . var_export($row['Default'], true) . '\n';
    }
    echo "ROWS:\n";
    $stmt2 = $dbh->query('SELECT * FROM produk LIMIT 5');
    foreach ($stmt2 as $row) {
        echo json_encode($row) . '\n';
    }
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
