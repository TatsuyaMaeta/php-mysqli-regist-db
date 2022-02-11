<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="do_register.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>種類</th>
                    <th>入力欄</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <label for="bk_title">
                        <td>ほんのタイトル</td>
                        <td><input type="text" name="bk_name"></td>
                    </label>
                </tr>
                <tr>
                    <label for="bk_category">
                        <td>本の種類</td>
                        <td>
                            <input id="chk_comic" type="radio" name="bk_category" value="comic"><label
                                for="chk_comic">コミック</label>
                            <input id="chk_magazin" type="radio" name="bk_category" value="magazin"><label
                                for="chk_magazin">雑誌
                            </label> <br>
                            <input id="chk_essey" type="radio" name="bk_category" value="essey"><label
                                for="chk_essey">エッセイ</label>
                            <input id="chk_novel" type="radio" name="bk_category" value="novel"><label
                                for="chk_novel">小説</label>
                        </td>
                    </label>
                </tr>
                <tr>
                    <label for="bk_text">
                        <td>本のメモ</td>
                        <td>
                            <textarea id="bk_text" cols="20" rows="5" name="bk_text"> </textarea>
                        </td>
                    </label>
                </tr>
                <tr>
                    <label for="bk_p">
                        <td>本の価格</td>
                    </label>
                    <td><input id="bk_p" type="text" name="bk_price" oninput="value = onlyNumbers(value)"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <label for=" bk_price">
                        <td>本の購入日</td>
                        <td><input type="date" name="date"></td>
                    </label>
                </tr>
            </tfoot>
        </table>
        <input type="submit" value="送信">
    </form>
</body>
<script>
// 数値以外の入力をさせない
// https: //www.wetch.co.jp/only-numbers-input/
const onlyNumbers = n => {
    return n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248)).replace(/\D/g, '');
}
</script>

</html>