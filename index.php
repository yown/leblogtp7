<?php session_start();

	require_once('includes/fonctions.php');
	require_once('includes/userFonctions.php');
/*
 *---------------------------------------------------------------
 *                        ENVIRONMENT
 *---------------------------------------------------------------
 *
 * Allow you to change error reporting and others debugging mode
 * Can take 2 values :
 *
 *     development
 *     production
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 *                      ERROR REPORTING
 *---------------------------------------------------------------
 */

	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The ENVIRONEMENT status in /index.php doesnt seem right.');
	}


/*
 * --------------------------------------------------------------------
 *                            SOME VARS
 * --------------------------------------------------------------------
*/

//The default controller in case of undefine controller
	define('DEFAULTCONTROLLER', 'home');
//THE ULTIMATE MOTH****KING PATH
	define('APPPATH', realpath('.'));
	
	define('NBARTICLEBYPAGE', 2);

/*
 * --------------------------------------------------------------------
 *                         LETS RULE THE WORLD
 * --------------------------------------------------------------------
 *
 * Routing _GET to fetch the right controller
 *
 */

if(!empty($_SESSION['id_user']))
	rankSession($_SESSION['id_user']);

 // if controller not defined -> DEFAULTCONTROLLER

	$controllerName = (empty($_GET['action'])) ? DEFAULTCONTROLLER : strtolower($_GET['action']);

// the file doesnt exist lets show DEFAULTCONTROLLER
// The file Exist, routing on it
	if(controllerExist($controllerName))
		Loader($controllerName);
	else
	{
		require_once('includes/viewsFonctions.php');
		show404();
	}

?>