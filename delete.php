<?php

require 'config.php';
require 'core/filehandler.php';
require 'core/Database.php';
require 'core/Faculty.php';
	
header('Content-type: application/json');
$Handler=new FileHandler();
$db=new Database();
$faculty=new Faculty($db->connect());

$req=$_GET['req'] ?? null;

switch ($req) {
	case 'doc_name':
		echo $faculty->get_docnames();
		break;
	case 'delete_item':
		$name=$_GET['name'] ?? null;
		$Handler->name=$name;
		$Handler->remove();
		echo $faculty->deletenotes($name);
		break;
	
	default:
		echo json_encode(["Invalid Request"]);
		break;
}

?>