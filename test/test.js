/*読み込み時にロードするようにしている*/
window.onload = function selectYearMonth() {
    var optionLoop, pw_m, pw_y, ym, today, this_y, num_ym, str_ym, str_y, str_m, y, m, num_y, num_m;
    today = new Date();
    this_y = today.getFullYear();
    /*hiddenで渡した初期値を以下で年と月に分解し数値化する*/
    ym = $("#select-month").val();
    num_ym = ym.replace(/[^0-9]/g, "");
    str_ym = String(num_ym);
    str_y = str_ym.slice(0, 4);
    str_m = str_ym.slice(-2);
    pw_y = Number(str_y);
    pw_m = Number(str_m);

    /*初期値をvalueとしてプルダウンに返す*/
    document.getElementById("id_year").value = pw_y;
    document.getElementById("id_month").value = pw_m;

    /*ループ関数定義（スタート数字、終了数字、表示id名、デフォルト数字）*/
    optionLoop = function (start, end, id, pw) {
        var i, opt;
        opt = "<li value='" + start + "'><a href='#'>" + start + "</a></li>";
        for (i = start + 1; i <= end; i++) {
            opt += "<li value='" + i + "'><a href='#'>" + i + "</a></li>";
        }
        return document.getElementById(id).innerHTML = opt;
    }

    /*ループ関数に年月を代入（スタート数字[必須]、終了数字[必須]、表示id名[省略可能]、デフォルト数字[省略可能]）*/
    optionLoop(2019, this_y, "id_year", pw_y);
    optionLoop(1, 12, "id_month", pw_m);
}