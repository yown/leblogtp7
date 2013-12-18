<?php

/*
 *---------------------------------------------------------------
 *                          Functions
 *---------------------------------------------------------------
 */

//connexion base de donnée tout ça , toutes fonctions ne dependant pas d'une utilisation genre 'billet'
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
	if(file_exists('models/'.$name.'.php'))
		require_once('models/'.$name.'.php');
		
	if(file_exists('libs/'.$name.'.php'))
		require_once('libs/'.$name.'.php');
		
	if(!file_exists('controllers/'.$name.'.php'))
		exit('Controller '.$name.' not found in fonctions.php::Loader()');
		
	require_once('controllers/'.$name.'.php');
}

function callView($name, $data = null)
{
	if(!file_exists('views/'.$name.'.php'))
		exit('View '.$name.' Can\'t be loaded in fonctions.php::callView');
	require('views/'.$name.'.php');
}

function show404()
{
	callView('404');
	exit;
}















?>