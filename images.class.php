<?php
declare(strict_types = 1);
class Images{
	private $MySQL, $Images = array();
	public function __construct(){
		if(!class_exists("DBC")){
			include("./connect.class.php");
		}
		$this -> MySQL = DBC::Connect();
		$this -> MySQL -> select_db(Config::GetData("Database"));
	}

	// Obtener historia y devolver array
	public function GetStory() : array {
		$this -> GetStoryPart("inicio");
		$this -> GetStoryPart("mitad");
		$this -> GetStoryPart("final");
		return $this -> Images;
	}

	// Obtencion de imagenes
	public function GetStoryPart(string $category) : void {
		$sql = "SELECT `image` FROM `slideshow` WHERE `category` = ? ORDER BY RAND() LIMIT 1";
		$prepare = $this -> MySQL -> prepare($sql);
		$prepare -> bind_param("s", $category);
		$prepare -> execute();
		$prepare -> bind_result($image);
		$prepare -> fetch();
		array_push($this -> Images, $image);
		$prepare -> free_result();
	}

	// Cerrar la conexion MySQL
	public function close() : void{
		$this -> MySQL -> close();
	}

}
?>