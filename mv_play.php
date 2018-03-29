<?php

require_once 'config/db_connect.php';

$file=mysqli_fetch_object(mysqli_query($link, "SELECT * FROM files WHERE idFile='".$_REQUEST['file_id']."'"));
#print_r($file);
$path=mysqli_fetch_object(mysqli_query($link, "SELECT * FROM path WHERE idPath='".$file->idPath."'"));

echo '<video src="movie'.$path->strPath.$file->strFilename.'" controls type="video/mp4" width="80%"></video>';

?>