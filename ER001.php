<?php
$buff = $_GET['num'];
print $buff;
if($buff == 1){
	$er_text = 'Please input your id and password.';
}else if($buff == 2){
	$er_text = 'Not found id.';
}else{
	$er_text = 'Password is incorrect.';
} 
?>

<!DOCTYPE html>
<html>
 <head>
   <title>Chat - Error101</title>
   <style type="text/css">
   		.ERMessage{
   			color: red;
   		}
   </style>
 </head>
 <body>
  	<h1>Chat</h1>
  	<td><strong class="ERMessage">Error</strong></td>
  	<br>
	<td><span class="ERMessage"><?php print $er_text ?></span></td>
  	<br>
  	<form action="WC101.php">
  		<input type="submit" value="back">
  	</form>
 </body>
</html>
