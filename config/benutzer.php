<?php

require_once 'db_connect.php';



$all=mysqli_query($link, "SELECT * FROM user_profile WHERE user_id='".$_COOKIE['user_id']."'");

if(mysqli_num_rows($all)>0){
	echo "tadaaaaa";
}

?>