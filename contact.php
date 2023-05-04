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
						   </div>
							<div class="Form-Item">
								<p class="Form-Item-Label">
									フリガナ  <span class="Form-Item-Label-Required">必須</span>
								</p> 
								<input type="text" value="" name="kana_name" id="kana_name" class="Form-Item-Input-sei" placeholder="セイメイ">
							</div>
							<div class="Form-Item">
								<p class="Form-Item-Label">メールアドレス  <span class="Form-Item-Label-Required">必須</span></p>
								<input type="email" value="" name="mail" id="mail" class="Form-Item-Input2" placeholder="メールアドレスを入力してください">
							</div>
							<div class="Form-Item">
								<p class="Form-Item-Label">
									電話番号
								</p>
								<input type="text" value="" name="tell" id="tell" class="Form-Item-Input2" placeholder="電話番号を入力してください">
							</div>
							<div class="Form-Item">
								<p class="Form-Item-Label isMsg">お問い合わせ内容 <span class="Form-Item-Label-Required">必須</span></p>
								<input type="text" value="" name="inquiry" id="inquiry" class="Form-Item-Input3" placeholder="お問い合わせ内容を入力してください">
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<!-- 日本語のエラーメッセージを読み込み -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/localization/messages_ja.min.js"></script>
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

		//バリデーションチェック
		$(function() {
			if($('#form').length) {
				$('#form').validate({
					rules: {
						name: {
							required: true,
						},
						kana_name: {
							required: true,
						},
						mail: {
							required: true,
							email: true
						},
						tell: {
							required: false,
							number: true
						},
						inquiry: {
							required: true,
							maxlength: 100
						}
			},
			messages: {
				name: {
					required: '必須項目です。入力をお願いします。'
				},
				kana_name: {
					required: '必須項目です。入力をお願いします。'
				},
				mail: {
					required: '必須項目です。入力をお願いします。',
					mail: 'Eメールの形式で入力して下さい。'
				},
				tell: {
					required: '必須項目です。入力をお願いします。',
					number: '電話番号の形式で入力して下さい。'
				},
				inquiry: {
					required: '必須項目です。入力をお願いします。',
					maxlength: '最大文字数100を超えています。文章を短くして下さい。'
				}
			},
				});
			}
		});
	</script>
</body>
</html>
