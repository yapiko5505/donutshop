<?php
    // Composer のオートローダーの読み込み
    require 'vendor/autoload.php';
    // エアーメッセージ用日本語言語ファイルを読み込む場合
    require 'vendor/phpmailer/phpmailer/language/phpmailer.lang-ja.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    // 値の受け取り
    session_start();
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $message = $_SESSION['message'];
    // メール内容
    $mail_body = '<h2>' .$name. 'さん</h2><br>
                 <p>お問い合わせ内容はこちらです。</p>
                 <p>メールアドレス:' .$email. '</p>
                 <p>メッセージ:' .$message. '</p>';
    // 言語、内部エンコーディングを指定
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    // インスタンスを生成（引数にtrueを指定して例外Exceptionを有効に)
    $mail = new PHPMailer(true);
    // 日本語用設定
    $mail->charset = 'UTF-8';
    // エラーメッセージ用言語ファイルを使用する場合に設定
    $mail->setLanguage('ja', 'vendor/phpmailer/phpmailer/language/');

    // お問い合わせ自動保存
    $dsn = 'mysql:dbname=donuts-shop;host=localhost';
    $user='root';
    $password='';

    try {
        // お問い合わせ自動保存
        $dbh=new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // サーバの設定
        $mail->SMTPDebug = 0; //デバッグの出力を有効に（テスト環境での検証用)
        $mail->isSMTP(); //SMTPを使用
        $mail->Host = 'sandbox.smtp.mailtrap.io'; //SMTPサーバーを指定
        $mail->SMTPAuth = 'true'; //SMTP authenticationを有効に
        $mail->Username = '9bd8e1cc2e1359'; //SMTPユーザ名
        $mail->Password = '064427d421b00c'; //SMTPパスワード
        $mail->SMTPSecure = 'tls';  // 暗号化を有効に
        $mail->Port = 2525;
        //受信者設定
        //※名前などに日本語を使う場合は文字エンコーディングを変換
        //差出人アドレス, 差出人名
        $mail->setFrom('from@example.com', 'DONUT Shopお問い合わせフォーム');
        // 受信者アドレス、受信者名(受信者名はオプション)
        $mail->addAddress($email, $name);
        // コンテンツ設定
        $mail->isHTML(true);   // HTML形式を指定
        //メール表題（文字エンコーディングを変換）
        $mail->Subject = mb_encode_mimeheader('DONUT Shopお問い合わせフォームのメールです。', 'ISO-2022-JP');
        //HTML形式の本文（文字エンコーディングを変換）
        $mail->Body = $mail_body;
        $mail->send(); //送信
        session_destroy();

        // お問い合わせ自動保存
        $sql = 'INSERT INTO contact (name, email, message) VALUES(" '.$name. ' ", " '.$email.' "," '.$message.' ")';
        $stmt=$dbh->prepare($sql);
        $stmt->execute();

        $dbh=null;
        
    } catch (Exception $e) {
        // エラーが発生した場合
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit;
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>DOUNUT Shop 完了画面</title>
    </head>
    <body>
        <h2>お問い合わせ内容</h2>
        <p>お問い合わせいただきありがとうございます。</p>
        <p>送信完了しました。</p>
    </body>
</html>
        
        
        
        
        