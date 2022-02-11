<?php 
$bk_name        = $_POST['bk_name'];
$bk_category    = $_POST['bk_category'];
$bk_text        = $_POST['bk_text'];
$bk_price       = $_POST['bk_price'];
$bk_date           = $_POST['bk_date'];

require_once("dbconnect.php");


// 渡ってきている中身をチェックする
// https://willdosomeday.com/php-post-get%E3%81%A7%E9%80%81%E4%BF%A1%E3%81%97%E3%81%9F%E5%80%A4%E3%82%92%E3%81%99%E3%81%B9%E3%81%A6%E5%8F%96%E5%BE%97%E3%81%99%E3%82%8B/
// foreach($_POST as $key => $value) {
// echo $key. " : " .$value." ".gettype( $value ). "<br />";
// }

//var_dump("<pre>".$_POST."</pre>");

// echo $bk_name." / ".$bk_category." / ".$bk_text." / ".$bk_price." / ".$date;

//https://gray-code.com/php/insert-data-by-using-mysqli/
// (3)文字コードを設定
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    // エラーなければこちらを実行
    // 文字セットをutf8に指定する
    $mysqli->set_charset("utf8");
}


// (4)プリペアドステートメントの用意
$stmt = $mysqli->prepare(
            'INSERT INTO books_table
                        (bk_name, bk_category, bk_text, bk_price, bk_date) 
                VALUES  (?, ?, ?, ?, ?)'
);

// Fatal error: Uncaught Error: Call to a member function bind_param() on bool in
// というふうにエラーでDBに登録できない時は
// INSERT文が間違っているのかそれ以外が間違っているのかを切り分けるために
// MYSQLに直接打ち込んで見る

// (5)登録するデータをセット
$stmt->bind_param('sssis', $bk_name, $bk_category, $bk_text, $bk_price, $bk_date);


// (6)登録実行
$stmt->execute();

// (7)DB接続を閉じる
$mysqli->close();

?>