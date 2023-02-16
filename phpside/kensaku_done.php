<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>DONUTS Shop</title>
    </head>
    <body>
        <?php
            $code=$_POST['code'];

            $dsn='mysql:dbname=donuts-shop;host=localhost';
            $user='root';
            $password='';
            $dbh=new PDO($dsn, $user, $password);

            $sql='SELECT * FROM contact WHERE code=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$code;
            $stmt->execute($data);

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
                echo'<br>';
            }

            $dbh = null;

        ?>
    </body>
</html>