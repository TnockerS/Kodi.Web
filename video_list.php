<?php

require_once 'config/db_connect.php';


$all_files=mysqli_query($link, "SELECT * FROM files ORDER BY dateAdded DESC");
while($file = mysqli_fetch_array($all_files)){
	$file_image=mysqli_fetch_object(mysqli_query($link, "SELECT * FROM movie WHERE idFile='".$file['idFile']."'"));
	if(isset($file_image)){
		$id_file=mysqli_fetch_object(mysqli_query($link, "SELECT * FROM files WHERE idFile='".$file_image->idFile."'"));
	preg_match_all("/<thumb aspect=\"poster\" .*?preview=\"(.*?)\"[^>]*>(.*?)<\/thumb>/isU",$file_image->c08,$a);
	//print_r($a);
	//print_r($a[1][0]);
	if(!empty($a[1][0])){
	  echo '<div class="file round shadow" mv_id="'.$id_file->idFile.'"><img class="round" src="'.$a[1][0].'"/></div>';

}
	}
}



?>

<script type="text/javascript">
 $('.file').on('click', function(){
    var mv_id=$(this).attr('mv_id');
    console.log(mv_id);
    $('.mv').load('mv_play.php?file_id='+mv_id);
    $('.mv_container').fadeIn();
 })
 $('.closer').on('click', function(){
 	$('.mv').empty();
 	$('.mv_container').fadeOut();
 })

    </script>