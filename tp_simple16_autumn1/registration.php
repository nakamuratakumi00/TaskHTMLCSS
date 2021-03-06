<?php
//都道府県
$Prefecture = $_GET['Prefecture'];
//地域
$japan = $_GET['japan'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>過去の天気</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="過去の天気を表示します。" />
  <meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/style-opening.css" />
  <script src="js/fixmenu_pagetop.js"></script>
  <script src="js/japan.js"></script>
  <script src="js/openclose.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="homes">
  <div id="container">
    <header>
      <h1 id="logo">
        <a href="index.html"><img src="images/logo.png" alt="SAMPLE SITE" /></a>
      </h1>

      <!--PC用（801px以上端末）メニュー-->
      <nav id="menubar">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="help.html">Help</a></li>
        </ul>
      </nav>

      <ul class="icon">
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </header>

    <div id="contents">
      <aside class="inner first">
        <h2>地点を登録！</h2>
        <div style="text-align: center">

          <footer>
            <small>Copyright&copy; <a href="index.html">SAMPLE SITE</a> All Rights
              Reserved.</small>
            <span class="pr">《<a href="https://template-party.com/" target="_blank">Web Design:Template-Party</a>》</span>
          </footer>
        </div>
        <!--/#contents-->
    </div>
    <!--/#container-->

    <!--オープニングアニメーション-->
    <aside id="mainimg">
      <img src="images/ooame.png" alt="" class="photo photo1" />
      <img src="images/ooyuki.png" alt="" class="photo photo2" />
      <img src="images/hare.png" alt="" class="photo photo3" />
      <img src="images/arare.png" alt="" class="photo photo4" />
      <img src="images/ooame.png" alt="" class="photo photo5" />
      <img src="images/kaminari.png" alt="" class="photo photo6" />
      <img src="images/yoruNoKaisei.png" alt="" class="photo photo7" />
      <img src="images/kumoriNotiHare.png" alt="" class="photo photo8" />
      <img src="images/kyouhuu.png" alt="" class="photo photo9" />
    </aside>

    <!--小さな端末用（800px以下端末）メニュー-->
    <nav id="menubar-s">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="link.html">Link</a></li>
      </ul>
    </nav>

    <!--ページの上部に戻る「↑」ボタン-->
    <p class="nav-fix-pos-pagetop"><a href="#">↑</a></p>

    <!--メニュー開閉ボタン-->
    <div id="menubar_hdr" class="close"></div>

    <!--メニューの開閉処理条件設定　800px以下-->
    <script>
      if (OCwindowWidth() <= 800) {
        open_close("menubar_hdr", "menubar-s");
      }
    </script>
</body>

</html>