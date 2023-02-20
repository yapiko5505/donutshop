<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login'])==false)
    {
        echo 'ログインされていません。';
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
        スタッフ追加</br>
        <form method="post" action="staff_add_check.php">
            スタッフ名を入力してください。</br>
            <input type="text" name="name" style="width:200px"></br>
            パスワードを入力してください。</br>
            <input type="password" name="password" style="width:100px"></br>
            パスワードをもう一度入力してください。</br>
            <input type="password" name="password2" style="width:100px"></br></br>
            <input type="button" onClick="history.back()" value="戻る">
            <input type="submit" value="OK">
        </form>


    </body>
</html>