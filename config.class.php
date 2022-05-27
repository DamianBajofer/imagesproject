<?php
declare(strict_types = 1);
header("Access-Control-Allow-Origin: *");
class Config{
	
	// Credenciales de MySQL
	private static $MySQLData = array(
		"Host" => 		"localhost",
		"Port" => 		"3306",
		"User" => 		"root",
		"Pass" => 		"",
		"Database" => 	"website"
	);

	public static $SiteData = array(
		"Domain" => "http://localapps.com/images-project/"
	);

	public static function GetData(string $data) : string{
		return self::$MySQLData[$data];
	}
}
?>