<?php

$APPPATH = basename(realpath('index.php'));

$action = (empty($_GET['action'])) ? '' : $_GET['action'];

if(file_exists('controllers/'.$action.'.php'))
	require_once('controllers/'.$action.'.php');
else
	require_once('controllers/home.php');

?>