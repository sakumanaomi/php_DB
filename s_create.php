<?php
// var_dump($_POST);
// exit();


if(isset($_POST['hairVolume'])) {
    $hairVolume = $_POST['hairVolume'];
    echo '髪の量は：' . $hairVolume . '<br>';
} else {
    echo '選択されていません。<br>';
}
if(isset($_POST['hairQuality'])) {
    $hairQuality = $_POST['hairQuality'];
    echo '髪質は：' . $hairQuality . '<br>';
} else {
    echo '選択されていません。<br>';
}
if(isset($_POST['hairColor'])) {
    $hairColor = $_POST['hairColor'];
    echo '髪の色は：' . $hairColor . '<br>';
} else {
    echo '選択されていません。<br>';
}
if(isset($_POST['eyeColor'])) {
    $eyeColor = $_POST['eyeColor'];
    echo '瞳の色は：' . $eyeColor . '<br>';
} else {
    echo '選択されていません。<br>';
}
if(isset($_POST['skinColor'])) {
    $skinColor = $_POST['skinColor'];
    echo '肌の色は：' . $skinColor . '<br>';
} else {
    echo '選択されていません。<br>';
}
if(isset($_POST['suntan'])) {
    $suntan = $_POST['suntan'];
    echo '日焼けすると：' . $suntan . '<br>';
} else {
    echo '選択されていません。<br>';
}

$hairVolume = $_POST['hairVolume'];
$hairQuality = $_POST['hairQuality'];
$hairColor = $_POST['hairColor'];
$eyeColor = $_POST['eyeColor'];
$skinColor = $_POST['skinColor'];
$suntan = $_POST['suntan'];

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
$sql = 'INSERT INTO personalColor_table(id,hairVolume,hairQuality,hairColor,eyeColor,skinColor,suntan,created_at) VALUES(NULL, :hairVolume, :hairQuality, :hairColor, :eyeColor, :skinColor, :suntan, now())';

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
