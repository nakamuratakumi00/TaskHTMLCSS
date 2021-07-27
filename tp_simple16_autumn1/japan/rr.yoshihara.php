<?php

$japan = $_GET['japan'];
$Prefecture = $_GET['Prefecture'];
$date = $_GET['date'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>

  <meta charset="utf-8">

  <title></title>

</head>
<body>
<form action="aaa.yosihara.php" method="GET" enctype="multipart/form-data">
 
  CSVファイル：<br />
  <input type="file" name="csvfile" size="30" /><br />

  <input type="submit" value="アップロード" />

  <input type="hidden" id="datepickerValue" name="date" value="<?php echo $date; ?>">
  <input type="hidden" name="Prefecture" value="<?php echo $Prefecture; ?>" />
  <input type="hidden" name="japan" value="<?php echo $japan; ?>" />

</form>
</body>
</html>