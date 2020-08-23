<?php
	define('SYSTEM_PATH', __DIR__);
	$get_controller = empty($_GET['c'])?'Home':$_GET['c'];
	//echo $get_controller;
	$get_action = empty($_GET['a'])?'Index':$_GET['a'];
	$controller = $get_controller.'Controller';
	$path_controller = 'Controller/'.$get_controller.'Controller.php';
	if(!file_exists($path_controller)){//Kiem tra su ton tai cua file
		die( 'File not found');
	}
	//require_once 'config.php';

	require_once $path_controller;
	if(!class_exists($controller)){//Kiem tra su ton tai class
		die('Controller not exist');
	}
	$controllerObject = new $controller;
	if(!method_exists($controllerObject, $get_action)){ //Kiem tra su ton tai function
		die('method not exist');
	}

	$controllerObject->{$get_action}();