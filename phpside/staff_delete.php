<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DONUTS Shop</title>
    </head>
    <body>
        <?php

            $staff_code=$_GET['code'];

            $dsn='mysql:dbname=donuts-shop;host=localhost;charset=utf8';
            $user='root';
            $password='';

            try
            {
                $dbh=new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql='SELECT code, name FROM staffs WHERE code=?';
                $stmt=$dbh->prepare($sql);
                $data[]=$staff_code;
                $stmt->execute($data);

                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                $staff_name=$rec['name'];

                $dbh=null;
            }
            catch(Exception $e)
            {
                echo 'ただいま障害により大変ご迷惑をお掛けしております。';
                echo $e;
                exit();
            }
        ?>

        <p>スタッフ削除<br></p>
        スタッフID<br>
        <form method="post" action="staff_delete_done.php">
            <input type="hidden" name="code" value="<?php echo $staff_code; ?>">
            <p>スタッフ名<br></p>
            <?php echo $staff_name; ?><br>
            このスタッフは削除してよろしいですか。<br><br>
            <input type="button" onClick="history.back()" value="戻る">
            <input type="submit" value="OK">
        </form>


    </body>
</html>