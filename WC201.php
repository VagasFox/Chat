<?php
/****データベースChatへのアクセスと読み込み****/
$dsn = 'mysql:dbname=Chat;host=127.0.0.1';
$user= 'root';
$pw = 'H@chiouji1';

$sql = 'SELECT * FROM User';

$dbh = new PDO($dsn, $user, $pw);
$sth = $dbh->prepare($sql);
$sth->execute();

$chara = [];
while(($buff = $sth->fetch()) !== false){
	$chara[] = $buff;
}
/**********************************************/

$NAME = $_REQUEST["loginID"];
$PASS = $_REQUEST["password"];

if($NAME === "" || $PASS === ""){
	$er = 1;
	$url = "http://127.0.0.1/new_Chat/ER001.php?num={$er}";
	header("Location: ".$url);
	exit(0);
}else {
	for($i = 0; $i < 3; $i++){
		$cur = $chara[$i];
		
		if($NAME===$cur[1] && $PASS===$cur[2]){
			$DISP_NAME = $cur;
			break;
		}
		else if($i === 3 && ($NAME !== $cur[1] || $PASS !== $cur[2])){
			$er = 3;
		$url = "http://127.0.0.1/new_Chat/ER001.php?num={$er}";
		header("Location: ".$url);
			exit(0);
		}
	}
}
?>

<!DOCTYPE html>
<html>
 <head>
   <title>Chat</title>
 </head>
 <body>
	<br>
	<u><?php print $DISP_NAME[3] ?></u>

	<input type="text" name="text">
	<input type="submit" value="Write">
	<hr>
  	<input type="submit" value="Refresh">
  	<br>
  	
  	<hr>
  	<a href="WC301.php" target="_blank">History</a>
  	<input type="submit" name="name" value="Logout">
 </body>
</html>


<?php

//↓入力部分で来たら実装
/*$fp = fopen('chat.log','a');
fwrite($fp, implode("\t",[
					date('Y-m-d H:i:s'),
					implode(',',$)
				]));
				
fwrite($fp, '\n');
fclose($fp);*/
?>
