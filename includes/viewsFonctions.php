<?php

/*
 *---------------------------------------------------------------
 *                          Variables
 *---------------------------------------------------------------
 */

$infosHeader = array
(
	'notifications' => array
	(
		'valide'      => array(),
		'error'       => array(),
		'information' => array()
	),
	'admin' => getUserRank($_SESSION['id_user'], 1),
	'blogger' => getUserRank($_SESSION['id_user'], 2)
);

/*
 *---------------------------------------------------------------
 *                          Functions
 *---------------------------------------------------------------
 */

function callView($name, $my_protected_generated_data = null)
{
	if(!empty($my_protected_generated_data))
		foreach($my_protected_generated_data as $key => $value)
			$$key = $value;
	
	if(!file_exists('views/'.$name.'.php'))
		exit('View '.$name.' Can\'t be loaded in fonctions.php::callView');
	require('views/'.$name.'.php');
}

function show404()
{
	header("HTTP/1.0 404 Not Found");
	
	callView('header');
	callView('404');
	callView('footer');
	exit;
}

function addValidation($string, &$array)
{
	$array['notifications']['valide'][] = $string;
}

function addError($string, &$array)
{
	$array['notifications']['error'][] = $string;
}

function addInformation($string, &$array)
{
	$array['notifications']['information'][] = $string;
}

?>