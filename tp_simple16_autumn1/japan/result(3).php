<?php

//検索条件受け取り
$Date = $_GET['date'];
$date = array((string)$Date);
//var_dump($date);
echo '<br>';

$Prefecture = $_GET['Prefecture'];
$prefecture = array((string)$Prefecture);

$Japan = $_GET['japan'];
$japan = array((string)$Japan);


$link = mysqli_connect('localhost', 'root', '', 'test2');


// 接続状況をチェック
if (mysqli_connect_errno()) {
    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
}



$dates = explode(",", $Date);
//var_dump($dates);

$sql = "select * from weather where prefecture='" . $prefecture[0] . "' AND district = '" . $japan[0] . "' AND date BETWEEN '" . $dates[0] . "' and '" . $dates[1] . "'";
$stmt = $link->query($sql);


while ($row = mysqli_fetch_assoc($stmt)) {
    $select_result[] = array(
        'date' => $row['date'],
        'highest_temperature' => $row['highest_temperature'],
        'lowest_temperature' => $row['lowest_temperature'],
        'noon_weather' => $row['noon_weather'],
        'night_weather' => $row['night_weather'],
        'district' => $row['district']
    );
}
echo '<br>';
//var_dump($select_result);


// タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

// 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // 今月の年月を表示
    $ym = date('Y-m');
}

// タイムスタンプを作成し、フォーマットをチェックする
$timestamp = strtotime($dates[0]);
// echo'<br>';
// echo $timestamp;
$ym = date('Y-m', $timestamp);
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// 今日の日付 フォーマット　
$today = date('Y-m-j');

// カレンダーのタイトルを作成　
$html_title = date('Y年n月', $timestamp);

// 前月・次月の年月を取得
// 方法１：mktimeを使う mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));



// 該当月の日数を取得
$day_count = date('t', $timestamp);

// １日が何曜日か　0:日 1:月 2:火 ... 6:土
// 方法１：mktimeを使う
$youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));


// カレンダー作成の準備
$weeks = [];
$week = [];

// 第１週目：空のセルを追加
// 例）１日が水曜日だった場合、日曜日から火曜日の３つ分の空セルを追加する
$week[] =
    [
        'full_tag' => str_repeat('<td></td>', $youbi)
    ];


for ($day = 1; $day <= $day_count; $day++, $youbi++) {

    // 日付だけゼロ埋めされていなかったのでゼロ埋め処理
    $day_zeroume = sprintf('%02d', $day);
    $date = $ym . '-' . $day_zeroume;


    $noon_weather_val = "";
    $highest_temperature_val = "";
    $night_weather_val = "";
    $lowest_temperature_val = "";

    // 結果が存在していて、かつ結果の日付がカレンダーの日付と一致する場合
    //$select_result[32]の時はfalse
    if (isset($select_result[$day - 1]) && $date == $select_result[$day - 1]['date']) {
        $noon_weather_val = $select_result[$day - 1]['noon_weather'];
        $date_val = $select_result[$day - 1]['date'];
        $highest_temperature_val = $select_result[$day - 1]['highest_temperature'];
        $night_weather_val = $select_result[$day - 1]['night_weather'];
        $lowest_temperature_val = $select_result[$day - 1]['lowest_temperature'];
    }

    switch ($noon_weather_val) {
        case "快晴":
            $image_template = '<img src="images\hare.png"width="60" height="60">';
            $noon_weather_val = sprintf($image_template);
            break;
        case "晴":
            $image_template = '<img src="images\hare.png"width="60" height="60">';
            $noon_weather_val = sprintf($image_template);
            break;
        case "曇":
            $image_template = '<img src="images\kumori.png"width="60" height="60">';
            $noon_weather_val = sprintf($image_template);
            break;
        case "晴後曇":
            $image_template = '<img src="images\harenotikumori.png"width="60" height="60">';
            $noon_weather_val = sprintf($image_template);
            break;
        case "雨":
            $image_template = '<img src="images\ame.png"width="60" height="60">';
            $noon_weather_val = sprintf($image_template);
            break;
        case "雨後曇":
            $image_template = '<img src="images\amenotikumori.png"width="60" height="60">';
            $noon_weather_val = sprintf($image_template);
        case "雪":
            $image_template = '<img src="images\yuki.png"width="60" height="60">';
            $noon_weather_val = sprintf($image_template);
            break;
    }



    //昼の天気結果を判断して画像挿入
    switch ($night_weather_val) {
        case "快晴":
            $image_template = '<img src="images\hare.png"width="60" height="60">';
            $night_weather_val = sprintf($image_template);
            break;
        case "晴":
            $image_template = '<img src="images\hare.png"width="60" height="60">';
            $night_weather_val = sprintf($image_template);
            break;
        case "曇":
            $image_template = '<img src="images\kumori.png"width="60" height="60">';
            $night_weather_val = sprintf($image_template);
            break;
        case "晴後曇":
            $image_template = '<img src="images\harenotikumori.png"width="60" height="60">';
            $night_weather_val = sprintf($image_template);
            break;
        case "雨":
            $image_template = '<img src="images\ame.png"width="60" height="60">';
            $night_weather_val = sprintf($image_template);
            break;
        case "雨後曇":
            $image_template = '<img src="images\amenotikumori.png"width="60" height="60">';
            $night_weather_val = sprintf($image_template);
            break;
        case "雪":
            $image_template = '<img src="images\yuki.png"width="60" height="60">';
            $night_weather_val = sprintf($image_template);
            break;
    }







    if ($today == $date) {
        // 今日の日付の場合は、class="today"をつける
        $day_html =
            [
                'start_tag' => '<td class="today">',
                'end_tag' => '</td>',
                'day' => $day,
                'noon_weather' => $noon_weather_val,
                'highest_temperature' => $highest_temperature_val,
                'night_weather' => $night_weather_val,
                'lowest_temperature' => $lowest_temperature_val,
            ];
    } else {
        $day_html =
            [
                'start_tag' => '<td>',
                'end_tag' => '</td>',
                'day' => $day,
                'noon_weather' => $noon_weather_val,
                'highest_temperature' => $highest_temperature_val,
                'night_weather' => $night_weather_val,
                'lowest_temperature' => $lowest_temperature_val,
            ];
    }
    $week[] = $day_html;

    // 週終わり、または、月終わりの場合
    if ($youbi % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // 月の最終日の場合、空セルを追加
            // 例）最終日が木曜日の場合、金・土曜日の空セルを追加
            $week[] =
                [
                    'full_tag' => str_repeat('<td></td>', 6 - ($youbi % 7))
                ];
        }
        //var_dump($week);
        echo '<br>';
        // weeks配列にtrと$weekを追加する
        $weeks[] =  $week;

        // weekをリセット
        $week = [];
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>天気概況アプリ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ここにサイト説明を入れます">
    <meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５">
    <link rel="stylesheet" href="..\css\result_style.css">
    </head>

    <body class="result">

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

            <body>
                <div id="contents">

                    <aside class="inner first">
                        <h2>検索結果</h2>

                        <div class="container">

                            <div class="container">
                                <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>日</th>
                                        <th>月</th>
                                        <th>火</th>
                                        <th>水</th>
                                        <th>木</th>
                                        <th>金</th>
                                        <th>土</th>
                                    </tr>


                                    <?php




                                    foreach ($weeks as $week) {
                                        echo '<tr>';
                                        foreach ($week as $day) {
                                            // echo $day;
                                            // var_dump($day);
                                            // echo '<br>';



                                            if (array_key_exists('full_tag', $day)) {
                                                echo $day['full_tag'];
                                            } else {
                                                echo $day['start_tag'];
                                                echo $day['day'];
                                                echo '<br>';
                                                echo $day['noon_weather'];
                                                echo $day['night_weather'];
                                                echo '<br>';
                                                echo '<font color = red>' . $day['highest_temperature'] . '</font>';
                                                echo '<br>';
                                                echo '<font color = blue>' . $day['lowest_temperature'] . '</font>';
                                                echo $day['end_tag'];
                                            }
                                        }
                                        echo '</tr>';
                                    }
                                    ?>




                                </table>
                            </div>

                        </div>
                    </aside>

                    <footer>
                        <small>Copyright&copy; <a href="index.html">SAMPLE SITE</a> All Rights Reserved.</small>
                        <span class="pr">《<a href="https://template-party.com/" target="_blank">Web Design:Template-Party</a>》</span>
                    </footer>

                </div>
                <!--/#contents-->

        </div>
        <!--/#container-->

        <!-- オープニングアニメーション -->
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