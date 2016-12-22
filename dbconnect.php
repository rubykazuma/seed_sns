<?php
	$db = mysqli_connect('localhost' , 'root' , 'mysql', 'seed_sns') or
	die(mysqli_connect_error());
	mysqli_set_charset($db, 'utf8'); //この場合utf8は小文字でつなげる
  //これはmysqlでないと使えない。PDO
  //使いたいmysqlで動くデータベースとPHPサーバーが一緒の場所にあるからlocalhositとかける。
 ?>