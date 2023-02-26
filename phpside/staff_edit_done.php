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
        <?php

            require_once('../kansu/common.php');

            $post=sanitize($_POST);
            $staff_code=$_POST['code'];
            $staff_name=$_POST['name'];
            $staff_pass=$_POST['password'];

            $dsn='mysql:dbname=donutsshop;host=localhost;charset=utf8';
            $user='root';
            $password='';

            try 
            {
                $dbh=new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql='UPDATE staffs SET name=?, password=? WHERE code=?';
                $stmt=$dbh->prepare($sql);
                $data[]=$staff_name;
                $data[]=$staff_pass;
                $data[]=$staff_code;
                $stmt->execute($data);

                $dbh=null;

            }
            catch(Exception $e)
            {
                echo 'ただいま障害により大変ご迷惑をお掛けしております。';
                echo $e;
                exit();
            }

        ?>

            <p>修正しました。</p><br><br>
            <a href="staff_list.php">スタッフ一覧に戻る</a>
    </body>
</html>