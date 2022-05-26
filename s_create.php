<?php
// var_dump($_POST);
// exit();

if(
  !isset($_POST['hairVolume[]'])|| $_POST['hairVolume[]']==''||
  !isset($_POST['hairQuality[]'])|| $_POST['hairQuality[]']==''||
  !isset($_POST['hairColor[]'])|| $_POST['hairColor[]']==''||
  !isset($_POST['eyeColor[]'])|| $_POST['eyeColor[]']==''||
  !isset($_POST['skinColor[]'])|| $_POST['skinColor[]']==''||
  !isset($_POST['suntan[]'])|| $_POST['suntan[]']==''
){
  exit('データが足りません');
}

$hairVolume[] = $_POST['hairVolume[]'];
$hairQuality[] = $_POST['hairQuality[]'];
$hairColor[] = $_POST['hairColor[]'];
$eyeColor[] = $_POST['eyeColor[]'];
$skinColor[] = $_POST['skinColor[]'];
$suntan[] = $_POST['suntan[]'];

// DB接続
// 各種項目設定
$dbn ='mysql:dbname=gsacy_d02_03;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．

// SQL作成&実行
$sql = 'INSERT INTO personalColor_table(id,hairVolume,hairQuality,hairColor,eyeColor,skinColor,suntan,created_at) VALUES(NULL, :todo, :deadline, now())';

$stmt = $pdo->prepare($sql);

// // バインド変数を設定
// $stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
// $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:s_input.php');
exit();
