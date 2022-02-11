<?php 
$bk_name        = $_POST['bk_name'];
$bk_category    = $_POST['bk_category'];
$bk_text        = $_POST['bk_text'];
$bk_price       = $_POST['bk_price'];
$date           = $_POST['date'];

require_once("dbconnect.php");


foreach($_POST as $key => $value) {
echo $key. " : " .$value." ".gettype( $value ). "<br />";
}

//var_dump("<pre>".$_POST."</pre>");

// echo $bk_name." / ".$bk_category." / ".$bk_text." / ".$bk_price." / ".$date;

//https://gray-code.com/php/insert-data-by-using-mysqli/

// (3)文字コードを設定
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    $mysqli->set_charset("utf8");
    echo "<br>clear<br>";
}


// (4)プリペアドステートメントの用意
$stmt = $mysqli->prepare(
            'INSERT INTO books_table
                        (bk_name, bk_category, bk_text, bk_price, date) 
                VALUES  (?, ?, ?, ?, ?)'
);

// (5)登録するデータをセット
$stmt->bind_param('sssis', $bk_name, $bk_category, $bk_text, $bk_price, $date);


// (6)登録実行
$stmt->execute();

// (7)DB接続を閉じる
$mysqli->close();

?>