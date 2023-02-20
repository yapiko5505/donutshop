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
            $staff_pass2=$_POST['password2'];

            $staff_name=htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
            $staff_pass=htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
            $staff_pass2=htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');

            if($staff_name==''){
                echo 'スタッフ名が入力されていません。';
            } else {
                echo 'スタッフ名';
                echo $staff_name;
                echo '<br>';
            }

            if($staff_pass==''){
                echo 'パスワードが入力されていません。<br>';
            }

            if($staff_pass!=$staff_pass2){
                echo 'パスワードが一致しません<br>';
            }

            if($staff_name=='' || $staff_pass=='' || $staff_pass!=$staff_pass2){
                echo '<form>';
                echo '<input type="button" onClick="history.back()" value="戻る">';
                echo '</form>';
            } else {
                $staff_pass=md5($staff_pass);
                echo '<form method="post" action="staff_add_done.php">';
                echo '<input type="hidden" name="name" value="'.$staff_name.'">';
                echo '<input type="hidden" name="password" value="'.$staff_pass.'">';
                echo '<br>';
                echo '<input type="button" onClick="history.back()" value="戻る">';
                echo '<input type="submit" value="OK">';
                echo '</form>';
            }
        ?>
      


    </body>
</html>