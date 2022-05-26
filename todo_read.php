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
$sql = 'SELECT * FROM todo_table';

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
  $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

// echo'<pre>';
// var_dump($result);
// echo'</pre>';
// exit();

$output = "";
foreach($result as $record){
  $output .="
    <tr>
      <td>{$record["deadline"]}</td>
      <td>{$record["todo"]}</td>
    </tr>
  ";
}

} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>DB連携型todoリスト（一覧画面）</legend>
    <a href="todo_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>deadline</th>
          <th>todo</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?=$output?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>