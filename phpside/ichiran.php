<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>DONUTS Shop</title>
    </head>
    <body>
        <?php 
            $dsn='mysql:dbname=donuts-shop;host=localhost';
            $user='root';
            $password='';
            $dbh=new PDO($dsn, $user, $password);

            $sql='SELECT * FROM contact WHERE 1';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();

            while(1)
            {
                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                if($rec==false)
                {
                    break;
                }

                echo $rec['code'];
                echo $rec['name'];
                echo $rec['email'];
                echo $rec['message'];
                echo '<br>';
            }

            $dbh = null;
        ?>
        <br><a href="../phplogin/staff_top.php">スタッフ管理に戻る</a>
    </body>
</html>
