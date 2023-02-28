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

            $staff_name=$_POST['name'];
            $staff_pass=$_POST['password'];

            $dsn='mysql:dbname=LAA1503403-donutsshop;host=mysql211.phy.lolipop.lan;charset=utf8';
            $user='	LAA1503403';
            $password='donuts25';

            try 
            {
                $dbh=new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql='INSERT INTO staffs(name, password) VALUES(?, ?)';
                $stmt=$dbh->prepare($sql);
                $data[]=$staff_name;
                $data[]=$staff_pass;
                $stmt->execute($data);

                $dbh=null;

                echo htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
                echo 'さんを追加しました。<br>';
            }
            catch(Exception $e)
            {
                echo 'ただいま障害により大変ご迷惑をお掛けしております。';
                echo $e;
                exit();
            }

        ?>

        <a href="staff_list.php">スタッフ一覧に戻る</a>
    </body>
</html>