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
	mysqli_set_charset ( $link , "utf8" );
	return $link;
}

function protectSQL($link, $value, $type = NULL)
{
	return mysqli_real_escape_string($link, $value);
}

//---------------

function toDate($time)
{
	$currentTime = time();
	$time = strtotime($time);
	
	if($currentTime-$time > 277840) // si plusde 3 jours
		return 'le '.date("d-m à H:i", $time);
	elseif($currentTime-$time > 86400)
		return 'il y a '.(int)(($currentTime-$time)/60/60/24).' jour(s)';
	elseif($currentTime-$time > 3600)
		return 'il y a '.(int)(($currentTime-$time)/60/60).' heure(s)';
	elseif($currentTime-$time > 60)
		return 'il y a '.(int)(($currentTime-$time)/60).' minutes';
	else
		return 'il y a 1 minute';
}


?>