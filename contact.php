<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>DOUNUT Shop - CONTACT</title>
        <meta name="description" content="ドーナツとドリンクを提供する店舗です。">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- css -->
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&display=swap" rel="stylesheet">
        <link rel="icon" type="image/ico" href="images/favicon-menu.ico">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="contact" class="big-bg">
            <header class="page-header wrapper">
                <nav>
                    <ul class="main-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="news.html">News</a></li>
                        <li><a href="menu.html">Menu</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </header>
            <div class="wrapper">
                <h2 class="page-title">Contact</h2>
                <?php if( $page_flag === 1): ?>
                    <!-- 確認画面 -->
                <?php elseif( $page_flag === 2): ?>
                    <!-- 完了画面 -->
                <?php else: ?>
                <form  method="post" action="confirm.php">
                    <div>
                        <label for="name">お名前</label>
                        <input type="text" id="name" name="your-name">
                    </div>

                    <div>
                        <label for="email">メールアドレス</label>
                        <input type="email" id="email" name="your-email">
                    </div>

                    <div>
                        <label for="message">メッセージ</label>
                        <textarea id="message" name="your-message"></textarea>
                    </div>

                    <input type="submit" class="button" value="送信">
                </form>
                <?php endif; ?>
            </div>
            <!-- /.wrapper -->

        </div>
        <section id="location">
            <div class="wrapper">
                <div class="location-info">
                    <h3 class="sub-title">DONUTS Shop</h3>
                    <p>
                        住所:仙台市泉区桂１－１－１<br>
                        電話:022-222-2222<br>
                        営業時間:7:00~17:00<br>
                        休日:火曜日、水曜日

                    </p>
                </div>
                <!-- location-info -->
                <div class="location-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3129.6626125505686!2d140.863252515268!3d38.333643079661606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f898111169736f3%3A0xdd27668dae7e7dc!2z44CSOTgxLTMxMzQg5a6u5Z-O55yM5LuZ5Y-w5biC5rOJ5Yy65qGC77yR5LiB55uu77yR4oiS77yRIOiNmOWGhemKgOihjOahguOCrOODvOODh-ODs-ODl-ODqeOCtuaUr-W6lw!5e0!3m2!1sja!2sjp!4v1676280938657!5m2!1sja!2sjp" width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- location-map -->
            </div>
            <!-- wrapper -->
        </section>
        <!-- location -->


        <footer>
            <div class="wrapper">
                <p><small>&copy; 2023 DOUNUTS shop</small></p>
            </div>
        </footer>
    </body>
</html>