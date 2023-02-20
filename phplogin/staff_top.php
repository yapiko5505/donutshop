<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login'])==false)
    {
        echo 'ログインされていません。<br>';
        echo '<a href="../phplogin/staff_login.html">ログイン画面へ</a>';
        exit();
    }
    else
    {
        echo $_SESSION['name'];
        echo 'さんログイン中<br>';
        echo '<br>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DONUTS Shop</title>
    </head>
    <body>
        <p>スタッフ管理トップメニュー<br>
            <a href="../phpside/staff_list.php">スタッフ一覧</a><br>
            <a href="../phpside/ichiran.php">お問い合わせ一覧</a><br>
            <a href="../phpside/kensaku.php">お問い合わせ検索</a><br>
            <a href="staff_logout.php">ログアウト</a><br>
        </p>
    </body>
</html>