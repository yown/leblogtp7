<?php

/*
 *---------------------------------------------------------------
 *                          Variables
 *---------------------------------------------------------------
 */

 /*
 * This array is included in header
 */
$infosHeader = array
(
	'notifications' => array
	(
		'valide'      => array(),
		'error'       => array(),
		'information' => array()
	)
);

/*
 *---------------------------------------------------------------
 *                          Functions
 *---------------------------------------------------------------
 */

/*
* Call a view $name with or without second parameters (variables)
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

/*
* display 404 error and exit
*/
function show404()
{
	header("HTTP/1.0 404 Not Found");
	
	callView('header');
	callView('404');
	callView('footer');
	exit;
}

/*
* Add validation message into $infosHeader
*/
function addValidation($string, &$array)
{
	$array['notifications']['valide'][] = $string;
}

/*
* Add error message into $infosHeader
*/
function addError($string, &$array)
{
	$array['notifications']['error'][] = $string;
}

/*
* Add informations message into $infosHeader
*/
function addInformation($string, &$array)
{
	$array['notifications']['information'][] = $string;
}

?>