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

            $dsn='mysql:dbname=LAA1503403-donutsshop;host=mysql211.phy.lolipop.lan;charset=utf8';
            $user='LAA1503403';
            $password='donuts25';

            try 
            {
                $dbh=new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql='SELECT code, name FROM staffs WHERE 1';
                $stmt=$dbh->prepare($sql);
                $stmt->execute();

                $dbh=null;

                echo 'スタッフ一覧<br><br>';

                echo '<form method="post" action="staff_branch.php">';
                    while(true)
                    {
                        $rec=$stmt->fetch(PDO::FETCH_ASSOC);

                        if($rec==false)
                        {
                            break;
                        }

                        echo '<input type="radio" name="code" value="'.$rec['code'].'">';
                        echo $rec['name'];
                        echo '<br>';
                    }

                    echo '<input type="submit" name="disp" value="参照">';
                    echo '<input type="submit" name="add" value="追加">';
                    echo '<input type="submit" name="edit" value="修正">';
                    echo '<input type="submit" name="delete" value="削除">';
                echo'<form>';
            }

            catch(Exception $e)
            {
                echo 'ただいま障害により大変ご迷惑をお掛けしております。';
                echo $e;
                exit();
            }

    ?>
     <br><a href="../phplogin/staff_top.php">スタッフ管理に戻る</a>      
    </body>
</html>