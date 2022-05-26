<?php
// DB接続
$dbn ='mysql:dbname=gsacy_d02_03;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'SELECT * FROM personalColor_table';

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
  $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

// echo'<pre>';
// var_dump($result);
// echo'</pre>';
// exit();
