<?php

define('ROOT_DIR', realpath(dirname(__DIR__)));
define('VIEWS_DIR', ROOT_DIR . '/src/views');

session_start();

require_once ROOT_DIR . '/vendor/autoload.php';
require_once ROOT_DIR . '/src/library.php';

try {
	$PDO = (new App\PDOFactory())->create([
		'dbhost' => 'localhost',
		'dbname' => 'quanlycuahangphukiennu',
		'dbuser' => 'root',
		'dbpass' => ''
	]);
} catch (Exception $ex) {
	echo 'Không thể kết nối đến MySQL,
		kiểm tra lại username/password đến MySQL.<br>';
	echo '<pre>';
	var_dump($ex);
	exit();
}

use Bramus\Router\Router as Router;

$router = new Router();

require(ROOT_DIR . '/routes/authentications.php');
require(ROOT_DIR . '/routes/customer.php');
require(ROOT_DIR . '/routes/errors.php');

$router->run();
