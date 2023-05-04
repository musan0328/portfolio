<?php
//セッション開始
session_start();

mb_language("japanese");
mb_internal_encoding("utf-8");

//必須項目に入力漏れがないか確認する
if(!empty($_POST['name']) && !empty($_POST['kana_name']) && !empty($_POST['mail']) && !empty($_POST['inquiry'])){
	//XSS対策
	//htmlspecialchars → JavaScriptのスクリプトタグを別の文字列に変換して、サニタイズする関数
	$name = htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_HTML5);
	$kana_name = htmlspecialchars($_POST['kana_name'], ENT_QUOTES | ENT_HTML5);
	$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES | ENT_HTML5);
	$tell = htmlspecialchars($_POST['tell'], ENT_QUOTES | ENT_HTML5);
	$inquiry = htmlspecialchars($_POST['inquiry'], ENT_QUOTES | ENT_HTML5);
}

// バリデーションチェック
// フォームが送信された場合にのみバリデーションを行う
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['kana_name'];
	$kana_name = $_POST['name'];
	$mail = $_POST['mail'];
	$inquiry = $_POST['inquiry'];
  
	// 名前が入力されているかどうかを確認する
	if (empty($name)) {
	  $errors[] = 'お名前を入力してください。';
	}

	// フリガナが入力されているかどうかを確認する
	if (empty($kana_name)) {
		$errors[] = 'フリガナを入力してください。';
	  }

	// メールアドレスが正しい形式で入力されているかどうかを確認する
	if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	  $errors[] = '正しいメールアドレスを入力してください。';
	}
  
	// メッセージが入力されているかどうかを確認する
	if (empty($inquiry)) {
	  $errors[] = 'お問い合わせ内容を入力してください。';
	}
  
	// エラーがない場合はメールを送信する
	if (empty($errors)) {
	  // メールを送信する処理を記述する
	  // 送信先のメールアドレスを指定する
	  $to = 'ayatsujisan2@gmail.com';

	  // メールの件名を指定する
	  $subject = 'お問い合わせがありました';
  
	  // メールの本文を作成する
	  $body = "お名前：{$name}\nメールアドレス：{$mail}\n\n{$inquiry}";
  
	  // メールを送信する
	  if (mail($to, $subject, $body)) {
		// 送信成功のメッセージを表示する
		echo 'メールを送信しました。';
	  } else {
		// 送信失敗のメッセージを表示する
		echo 'メールの送信に失敗しました。';
	  }
	}
  }
?>

<!doctype html>
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
</head>
	<body>
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
		<div class="content">
			<div class="main-center">
				<div class="contact-title">
					<h2 class="title">Contact</h2>
				</div>
				<div class="contact">
					<div class="contact-text">
						<p class="text">お店でこんなイベント企画してほしい! こんなメニューがあったらいいななど、お客様の
						要望があったらこちらのお問い合わせフォームに必要事項を記載して、お気軽にお問い合わせください。</p>
					</div>
					<div class="contact-irast">
						<img src="../coading/images/contact/contact-tori.png" alt="小鳥さんからの手紙" class="irast">
					</div>
					<form action="send.php" id="form" method="post">
						<div class="Form">
							<div class="Form-Item">
							 <p class="Form-Item-Label">
							   お名前 <span class="Form-Item-Label-Required">必須</span>
							 </p>
								 <input type="text" value="" name="name" id="name" class="Form-Item-Input-sei" placeholder="姓名">
								 <?php echo isset($flash['name']) ? $flash['name'] : null ?>
						   </div>
							<div class="Form-Item">
								<p class="Form-Item-Label">
									フリガナ  <span class="Form-Item-Label-Required">必須</span>
								</p> 
								<input type="text" name="kana_name" id="kana_name" class="Form-Item-Input-sei" placeholder="セイメイ">
								<?php echo isset($flash['kana_name']) ? $flash['kana_name'] : null ?>
							</div>
							<div class="Form-Item">
								<p class="Form-Item-Label">メールアドレス  <span class="Form-Item-Label-Required">必須</span></p>
								<input type="email" name="mail" id="mail" class="Form-Item-Input2" placeholder="メールアドレスを入力してください">
								<?php echo isset($flash['mail']) ? $flash['mail'] : null ?>
							</div>
							<div class="Form-Item">
								<p class="Form-Item-Label">
									電話番号
								</p>
								<input type="text" name="tell" id="tell" class="Form-Item-Input2" placeholder="電話番号を入力してください">
							</div>
							<div class="Form-Item">
								<p class="Form-Item-Label isMsg">お問い合わせ内容 <span class="Form-Item-Label-Required">必須</span></p>
								<?php echo isset($original['inquiry']) ? $original['inquiry'] : null;?>
								<input type="text" name="inquiry" id="inquiry" class="Form-Item-Input3" placeholder="ご質問、お問い合わせを入力してください">
							</div>
						 <input type="submit" class="Form-Btn" id="sbtn" name="submit" value="送信ボタン">
						 </div>
					</form>
				</div>
			</div>
		</div>
	<section>
	 <div id="google-map" class="google-map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1621.8227678730761!2d139.63171403111957!3d35.61180933695659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z5p2x5Lqs6YO95LiW55Sw6LC35Yy6546J5bedMuS4geebrjIxIOS6jOWtkOeOieW3nemnhQ!5e0!3m2!1sja!2sjp!4v1606968673078!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
	</section>
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
