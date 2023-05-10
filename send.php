<?php
    //XSS対策
    //htmlspecialchars → JavaScriptのスクリプトタグを別の文字列に変換して、サニタイズする関数
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $kana_name = htmlspecialchars($_POST['kana_name'], ENT_QUOTES);
    $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);
    $tell = htmlspecialchars($_POST['tell'], ENT_QUOTES);
    $inquiry = htmlspecialchars($_POST['inquiry'], ENT_QUOTES);

    // メール本文を作成
    $mailText = '名前：'.$name."\r\n"
    .'フリガナ：'.$kana_name."\r\n"
    .'メールアドレス：'.$mail."\r\n"
    .'電話番号：'.$tell."\r\n"
    .'お問い合わせ内容：'.$inquiry."\r\n";

    //指定したメールアドレスにメールが届く
    mail('ayatsujisan2@gmail.com', 'お問い合わせ', $mailText);
?>

<!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <title>Dear Dog Cafe</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../coading/css/reset.css">
    <link rel="stylesheet" href="../coading/css/contact.css">
    <link rel="icon" type="image/x-icon" href="../coading/images/fabikon/fabikon-dacs.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--metaタグ SEO対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="email=no,telephone=no,address=no">
    <meta property="og:url" content="ページのURL" />
    <meta property="og:title" content="Dear Dog Cafe" />
    <meta property="og:type" content="website">
    <meta property="og:description" content="仮想の犬カフェサイト「Dear Dog Cafe」の新規ホームページを作成しました。
    こちらはお問い合わせフォームになります。会社やお店によくあるようなフォームとなっています。動物カフェのサイトの参考に少しでも役に立ったら嬉しいです!" />
    <meta property="og:image" content="../coading/images/index/mainvisual/pixta_54961259_M.jpg" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@muweb4" />
    <meta property="og:site_name" content="Dear Dog Cafe" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="fb:app_id" content="3719290941492832">
    <header id="contact">
		<div id="top-head">
			<div class="inner">
				<div id="mobile-head"></div>
					<h1 class="logo">
						<a href="../coading/index.html"><img class="logo-dc" src="../coading/images/logo/dogcafelogo.jpg" alt="タイトルロゴ"></a>
					</h1>
				<div id="nav-toggle">
					<div>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<nav id="gloval-nav">
					<ul id="gloval-nav2" class="gloval-nav2">
						<li><a href="../coading/index.html">Home</a></li>
						<li><a href="../coading/dogs.html">Dogs</a></li>
						<li><a href="../coading/menu.html">Menu</a></li>
						<li><a href="../coading/info.html">Info</a></li>
						<li><a href="../coading/news.html">News</a></li>
						<li><a href="../coading/contact.php">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
<body>
    <h2>メール送信完了</h2>    
    <p class="message">
    お問い合わせありがとうございます。1営業日以内にご返信させていただきます。<br>
    自動返信メールをお送りしておりますのでご確認ください。
    </p>
    <footer>
            <img src="../coading/images/logo/Instagram.png" alt="インスタロゴ" class="logo" width="50px" height="50px">
            <img src="../coading/images/logo/Facebook.png" alt="Facebookロゴ" class="logo" width="50px" height="50px">
            <div class="footer-text">
                <small class="copyright">Copyright &copy; 2022 Dear Dog Cafe. All Right Reserved</small>
            </div>
        </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		
            //ナビゲーションメニュー
        $(function(){
        //表示するスクロール量（px）
        var scrollPoint = 60;
        $(window).scroll(function(){
            if($(this).scrollTop() > scrollPoint){
                $('#top-head').fadeIn();
            }
        });
    });

            //ハンバーガーメニュー
            $(function() {
            var $header = $('#top-head');
                console.log($header);
            //nav fixed
            $(window).scroll(function() {
                if ($(window).scrollTop() > 100) {
                    console.log(document.documentElement.scrollTop);
                    //css fixedクラス追加
                    $header.addClass('fixed');
                } else {
                    $header.removeClass('fixed');
                }
            });
                //nav toggle btn
            $("#nav-toggle").on('click',function() {
                $header.toggleClass('open');
            });
            });	
	</script>
 </body>
</html>