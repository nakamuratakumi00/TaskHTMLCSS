<?php
$Date = $_GET['date'];
$date = array((string)$Date);

$Prefecture = $_GET['Prefecture'];
$prefecture = array((string)$Prefecture);

$Japan = $_GET['japan'];
$japan = array((string)$Japan);

//echo $date;
//echo $japan;

//echo "aaa";

//$date = array('date' => '2019/01/01');
//$japan = array('japan' => 'toukyou');
//$prefecture = array('prefecture' => 'toukyou');

$link = mysqli_connect('localhost', 'root', '', 'test2');


// 接続状況をチェック
if (mysqli_connect_errno()) {
  die("データベースに接続できません:" . mysqli_connect_error() . "\n");
}

echo "データベースの接続に成功しました。<br />";
/*  */
// DB接続情報
/* $dsn = 'mysql:host=localhost;dbname=test2;charset=utf8mb4';
$username = 'root';
$password = '';


try {

  // PDOインスタンスを生成
  $dbh = new PDO($dsn, $username);

  // エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {

  // エラーメッセージを表示させる
  echo 'データベースにアクセスできません！' . $e->getMessage();

  // 強制終了
  exit;
} */

$dates = explode(",", $Date);


$sql = "select * from weather where prefecture='" . $prefecture[0] . "' AND district = '" . $japan[0] . "' AND date BETWEEN '" . $dates[0] . "' and '".$dates[1]."'";
$stmt = $link->query($sql);
foreach ($stmt as $row) {

  echo $row['prefecture']."<br />" ;
  echo $row['district']."<br />";
  echo $row['date']."<br />";
  echo $row['highest_temperature']."<br />" ;
  echo $row['lowest_temperature']."<br />" ;
  echo $row['noon_weather']."<br />";
  echo $row['night_weather']."<br />";
  echo "<br />";
}
