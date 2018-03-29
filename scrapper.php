<?php

$filer = file("https://s5.skyfall.to/Filme/tt4425200.mp4/embed.html?token=d24c152e-15179073385897");

for($i=0; $i<count($filer); $i++){
	
	print_r($filer[$i]."<br>");
}