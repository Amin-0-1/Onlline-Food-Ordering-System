
<?php
session_start();
if(is_null($_SESSION['username'])){
header('Location:Redirect.php');
}else{
	header('Location:Redirect.php');
}
?>

