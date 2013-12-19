<?php
/*
 *---------------------------------------------------------------
 *                          Functions
 *---------------------------------------------------------------
 */

//connexion base de données tout ça , toutes fonctions ne dependant pas d'une utilisation genre 'billet'
// il y aura une lib pour ça 

/*
* Return Boolean, true if controller exist, false otherway
*/
function controllerExist($name)
{
	return file_exists('controllers/'.$name.'.php');
}

/*
* Load Models and Libs if avaliable, And finaly the controller
*/
function Loader($name)
{
	// Let's load all fonctions display/views fonctions
	require_once('includes/viewsFonctions.php');
	
	if(file_exists('models/'.$name.'.php'))
		require_once('models/'.$name.'.php');
		
	if(file_exists('libs/'.$name.'.php'))
		require_once('libs/'.$name.'.php');
		
	if(!file_exists('controllers/'.$name.'.php'))
		exit('Controller '.$name.' not found in fonctions.php::Loader()');
		
	require_once('controllers/'.$name.'.php');
}

//---------------

function connect()
{
	$link = mysqli_connect("localhost","root","","blackwave") or die("Error ".mysqli_connect_error($link));
	return $link;
}

function protectSQL($link, $value, $type = NULL)
{
	return mysqli_real_escape_string($link, $value);
}

//---------------




?>