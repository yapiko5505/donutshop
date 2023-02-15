<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>DOUNUT Shop 完了画面</title>
    </head>
    <body>
        <?php if( $page_flag === 1): ?>
            <!-- 確認画面 -->
        <?php elseif( $page_flag === 2): ?>
            <p>送信が完了しました。</p>
        <?php else: ?>
            <!-- 入力画面 -->