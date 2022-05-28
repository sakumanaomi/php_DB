<?php
// var_dump($_POST);
// exit();
session_start();
$lid= $_POST["lid"];
$lpw= $_POST["lpw"];

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

// SQL作成&実行
$sql = "SELECT * FROM gs_user_table WHERE u_id=:lid AND u_pw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

if($res==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

//抽出データ数を取得
//$count = $stmt->fetchColumn();//SELECT COUNT(*)で使用可能
$val = $stmt->fetch();//1レコードだけ取得する方法

//4.該当レコードがあればSESSIONに値を代入
if( $val["id"] !=""){
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["u_name"] = $val['u_name'];
  //Login処理OKの場合select.phpへ遷移
  header ("Location: s_input.php");
}else{
  //login処理NGの場合login.phpへ遷移
  header("Location: login.php");
}
//処理終了
exit();

?>