<?php
declare(strict_types = 1);
class Images{
	private $MySQL, $Images = array(0 => array(), 1 => array(), 2 => array()), $ImagesList = array();
	public function __construct(){
		if(!class_exists("DBC")){
			include("./connect.class.php");
		}
		$this -> MySQL = DBC::Connect();
		$this -> MySQL -> select_db(Config::GetData("Database"));
	}

	// Obtencion de imagenes
	public function GetAllImages() : array {
		$sql = "SELECT * FROM `slideshow` ORDER BY RAND() LIMIT 3";
		$prepare = $this -> MySQL -> prepare($sql);
		$prepare -> execute();
		$prepare -> bind_result($id, $image);
		while($prepare -> fetch()){
			array_push($this -> ImagesList, $image);
		}
		$this -> GetImages(0);
		$this -> GetImages(1);
		$this -> GetImages(2);
		return $this -> Images;
	}

	public function GetImages(int $index) : void {
		for($i = 0; $i < 3; $i++){
			$rand = rand(0, count($this -> ImagesList)-1);
			array_push($this -> Images[$index], array("image" => $this -> ImagesList[$rand]));
		}
	}

	/*if (count($this -> Images[0]) < 3) {
				array_push($this -> Images[0], array("id" => $id, "image" => $image));
			}*/

	// Cerrar la conexion MySQL
	public function close() : void{
		$this -> MySQL -> close();
	}

}
?>