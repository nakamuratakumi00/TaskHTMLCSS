<?php
$japan = $_GET['japan'];
$Prefecture = $_GET['Prefecture'];
?>

<!DOCTYPE html>
<html lang="ja">

<body>

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>天気概要アプリ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="過去の天気を表示します。" />
        <meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/box.css" />
        <link rel="stylesheet" href="../css/style-opening.css" />
        <link rel="stylesheet" href="../css/calendar.css" />
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/start/jquery-ui.css" />
        <script src="../js/fixmenu_pagetop.js"></script>
        <script src="../js/openclose.js"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <div id="container">
        <header>
            <h1 id="logo">
                <a href="../index.html"><img src="../images/logo.png" alt="SAMPLE SITE" /></a>
            </h1>

            <!--PC用（801px以上端末）メニュー-->
            <nav id="menubar">
                <ul>
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../help.html">Help</a></li>
                </ul>
            </nav>

            <ul class="icon">
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </header>

        <div id="contents">
            <section class="inner first">
                <h2>日付を選択！</h2>
                <div style="text-align: center"></div>
                <form method="GET" action="result(3).php">
                
                    <div id="calendar"></div>
                    <div class="year-calendar">

                        <!----------------------------------------------- 下で日付を送る--------------------------------------------------------------->

                        <input type="hidden" id="datepickerValue" name="date" value="">
                    </div>

                    <!----------------------------------------------- 下で都道府県と地点を表示画面に送る--------------------------------------------------------------->

                    <input type="hidden" name="Prefecture" value="<?php echo $Prefecture; ?>" />
                    <input type="hidden" name="japan" value="<?php echo $japan; ?>" />

                    <!----------------------------------------------- ここまで！！--------------------------------------------------------------->

                    <input type="submit" value="表示" class="btn-submit" />
                
                </form>

                <form method="GET" action="rr.yoshihara.php">

                    <input type="hidden" id="datepickerValue" name="date" value="">

                    <!----------------------------------------------- 下で都道府県と地点を登録画面に送る--------------------------------------------------------------->
                    <input type="hidden" name="Prefecture" value="<?php echo $Prefecture; ?>" />
                    <input type="hidden" name="japan" value="<?php echo $japan; ?>" />

                    <input type="submit" value="登録" class="btn-submit1" />

                    <!----------------------------------------------- ここまで！！--------------------------------------------------------------->
                </form>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
                <script src="https://rawgit.com/jquery/jquery-ui/master/ui/i18n/datepicker-ja.js"></script>

                <script src="../js/calendar.js"></script>
            </section>
            <footer>
                <small>Copyright&copy; <a href="../index.html">SAMPLE SITE</a> All Rights
                    Reserved.</small>
                <span class="pr">《<a href="https://template-party.com/" target="_blank">Web
                        Design:Template-Party</a>》</span>
            </footer>
        </div>
        <!--/#contents-->
    </div>
    <!--/#container-->

    <!--オープニングアニメーション-->
    <aside id="mainimg">
        <img src="../images/ooame.png" alt="" class="photo photo1" />
        <img src="../images/ooyuki.png" alt="" class="photo photo2" />
        <img src="../images/hare.png" alt="" class="photo photo3" />
        <img src="../images/arare.png" alt="" class="photo photo4" />
        <img src="../images/ooame.png" alt="" class="photo photo5" />
        <img src="../images/kaminari.png" alt="" class="photo photo6" />
        <img src="../images/yoruNoKaisei.png" alt="" class="photo photo7" />
        <img src="../images/kumoriNotiHare.png" alt="" class="photo photo8" />
        <img src="../images/kyouhuu.png" alt="" class="photo photo9" />
    </aside>

    <!--小さな端末用（800px以下端末）メニュー-->
    <nav id="menubar-s">
        <ul>
            <li><a href="../index.html">Home</a></li>
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