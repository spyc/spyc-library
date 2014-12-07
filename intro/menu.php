<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<base target='content'>
<script src='http://<?= $_SERVER['HTTP_HOST'] ?>/whjsls/js/?all'></script>
<?php 
    include('../whjsls/system/smartmenus.inc');
?>
<body>
<ul id='main-menu' class='sm sm-vertical sm-blue sm-blue-vertical' style='width:12em;'>
	<li><a href='index.php' target='_top'><span id='logo-menu'>首頁</span></a></li>
	<li><a href="aim.php">本館宗旨</a></li>
	<li><a href="book.php">館藏介紹</a></li>
	<li><a href="rule.php">圖書館規則</a></li>
	<li><a href="head.php">館長的話</a></li>
	<li><a href="chairmen.php">主席的話</a></li>
	<li><a href="librarian.php">圖書館管理員</a></li>
</ul>
</body>
</html>