<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "controllers/UserController.php";
require_once "models/User.php";
require_once "config/database.php";

$url = isset($_GET['url']) && $_GET['url'] !== "" ? $_GET['url'] : 'register';
$controller = new UserController();

switch ($url){
	case 'register':
		$controller->register();
		break;

/*	case 'thanku':
		require "views/thanku.php";
		break;*/

	default:
		http_response_code(404);
		echo "<h2>404 - page not found</h2>";

}