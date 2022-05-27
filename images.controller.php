<?php
if(!class_exists("Config")){
	include("./config.class.php");
}
if(!class_exists("Images")){
	include("./images.class.php");
}
$image = new Images();
echo json_encode($image -> GetStory());
$image -> close();
?>