<?php

$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=test';
$options = [];
$pdo = new PDO($dsn, 'root', '123456', $options);

$stmt = $pdo->prepare('SELECT * FROM t1');
$stmt->execute();

/* Exercise PDOStatement::fetch styles */
echo 'PDO::FETCH_ASSOC: ';
echo "Return next row as an array indexed by column name\n";
$result = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($result);
echo "\n";

echo 'PDO::FETCH_BOTH: ';
echo "Return next row as an array indexed by both column name and number\n";
$result = $stmt->fetch(PDO::FETCH_BOTH);
print_r($result);
echo "\n";

echo 'PDO::FETCH_LAZY: ';
echo "Return next row as an anonymous object with column names as properties\n";
$result = $stmt->fetch(PDO::FETCH_LAZY);
print_r($result);
echo "\n";

echo 'PDO::FETCH_OBJ: ';
echo "Return next row as an anonymous object with column names as properties\n";
$result = $stmt->fetch(PDO::FETCH_OBJ);
print_r($result);
echo "\n";
