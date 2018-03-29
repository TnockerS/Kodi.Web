<?php
require_once 'db_connect.php';
if(!isset($_COOKIE[str_replace(".", "_", $_SERVER['HTTP_HOST'])])){
	print_r($_COOKIE);
$user=mysqli_fetch_object(mysqli_query($link, "SELECT * FROM user_login WHERE nic='".trim($_REQUEST['bn'][0])."' && pwd='".md5(trim($_REQUEST['bn'][1]))."'"));

if(!empty($user->nic) && $user->nic==trim($_REQUEST['bn'][0])){
	 setcookie( "".$_SERVER['HTTP_HOST']."", $user->nic, time()+(60*60*24*30) );
	 setcookie( "user_id", $user->id, time()+(60*60*24*30) );
	echo "ok";
}
else
{
	echo "falsch";
}
}
else
{
	echo "OK";
}
