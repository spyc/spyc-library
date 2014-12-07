<!doctype html>
<html>
<head>
<script src='../whjsls/js/?all'></script>
<link href='http://<?= $_SERVER['HTTP_HOST']?>/css/common.css' rel='stylesheet' type='text/css' />
<link href="http://<?= $_SERVER['HTTP_HOST'] ?>/whjsls/system/smartmenus/css/sm-core-css.css" rel="stylesheet" type="text/css">
<link href="http://<?= $_SERVER['HTTP_HOST'] ?>/whjsls/system/smartmenus/css/sm-clean/sm-clean.css" rel="stylesheet" type="text/css">
<base target='_top'>
<style>
	#main-menu{
		position:relative;
		z-index:9999;
		width:auto;
	}
	#main-menu ul{
		width:12em;
	}
	body{
		background-image:url('../img/bg_img.gif');
		background-repeat:no-repeat;
	}
</style>
<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/whjsls/system/smartmenus/jquery.smartmenus.js"></script>
<script>
$(function() {
	$('#main-menu').smartmenus({
		subMenusSubOffsetX: 1,
		subMenusSubOffsetY: -8
	}).find('ul').remove();
	$('header').css('background-image','../img/bg_img.gif');
});
</script>
</head>
<body>
<span class='title'>沙田培英中學圖書館</span>
<ul id='main-menu' class='sm sm-clean' style='margin-top:70px;'>
	<li><a href='http://<?= $_SERVER['HTTP_HOST']?>'><span id='logo-menu'>首頁</span></a></li>
	<li><a target='_blank' href="http://library.pyc.edu.hk/WebOPAC.exe">圖書檢索</a></li>
	<li><a href="http://<?= $_SERVER['HTTP_HOST']?>/news.php">最新資訊</a></li>
	<li>
		<a href="http://<?= $_SERVER['HTTP_HOST']?>/intro/index.php">本館資訊</a>
		<ul>
			<li><a href="http://<?= $_SERVER['HTTP_HOST']?>/intro/aim.php">本館宗旨</a></li>
			<li><a href="http://<?= $_SERVER['HTTP_HOST']?>/intro/book.php">館藏介紹</a></li>
			<li><a href="http://<?= $_SERVER['HTTP_HOST']?>/intro/rule.php">圖書館規則</a></li>
			<li><a href="http://<?= $_SERVER['HTTP_HOST']?>/head.php">館長的話</a></li>
			<li><a href="http://<?= $_SERVER['HTTP_HOST']?>/chairmen.php">主席的話</a></li>
			<li><a href="http://<?= $_SERVER['HTTP_HOST']?>/libraian.php">圖書管理員</a></li>
		</ul>
	</li>
	<li>
		<a href='http://<?= $_SERVER['HTTP_HOST']?>/newbook.php'>新書上架</a>
		<ul>
			<li><a href='http://<?= $_SERVER['HTTP_HOST']?>/newbook.php?lang=ch'>中文</a></li>
			<li><a href='http://<?= $_SERVER['HTTP_HOST']?>/newbook.php?lang=eng'>English</a></li>
		</ul>
	</li>
	<li>
		<a href='http://<?= $_SERVER['HTTP_HOST']?>/rank.php'>排行榜</a>
		<ul>
			<li><a href='http://<?= $_SERVER['HTTP_HOST']?>/rank.php?rank=book'>書籍排行榜</a></li>
			<li><a href='http://<?= $_SERVER['HTTP_HOST']?>/rank.php?rank=personal'>個人排行榜</a></li>
		</ul>
	</li>
</ul>
</body>
</html>