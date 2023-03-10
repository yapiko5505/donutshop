<?php
    require_once( 'vendor/autoload.php');
    Valitron\Validator::lang('ja');
    session_start();
    // Valitronクラスを実行
    $v = new Valitron\Validator($_POST);
    // 入力必須の項目が記入されているか確認
    // 入力項目のうち備考のみ任意項目にしてみる
    $v->rule('required', 'name')->message('{field}を入力してください。');
    $v->rule('required', 'email')->message('{field}を入力してください。');
    $v->rule('required', 'message')->message('{field}を入力してください。');
    // 入力された文字がメール形式かを確認
    $v->rule('email', 'email')->message('{field}が正しい形式ではありません。');
    // 項目名を指定
    $v->labels([
                    'name' => '名前',
                    'email' => 'メールアドレス',
                    'message' => 'メッセージ'
               ]);
    $_SESSION['name'] = htmlspecialchars($_POST['name']);
    $_SESSION['email'] = htmlspecialchars($_POST['email']);
    $_SESSION['message'] = htmlspecialchars($_POST['message']);
    // バリデーションを実行
    if($v->validate()) {
        // 値の受け取り
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $message = $_SESSION['message'];      
    } else {
        $errors = [];
        foreach ($v->errors() as $error) {
            foreach ($error as $value) {
                $errors[] = $value;
            }
        }
        $_SESSION['errors'] = $errors;
        header("location: contact.php");
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>DONUTS Shop 確認画面</title>
    </head>
    <body>
        <div class="form">
            <form method="post" action="submit.php">
                <div>
                    <label for="name">お名前</label>
                    <p><?php echo $name; ?></p>
                </div>
                <div>
                    <label for="email">メールアドレス</label>
                    <p><?php echo $email; ?></p>
                </div>
                <div>
                    <label for="message">メッセージ</label>
                    <p><?php echo $message; ?></p>
                </div>
            </form>
            <form action="contact.php" method="get">
                <button>戻る</button>
            </form>
            <form action="submit.php" method="post">
                <button type="submit" class="btn btn-success">送信する</button>
            </form>
        </div>
    </body>
</html>