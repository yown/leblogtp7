<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

 /*************************************
 *               SIGNUP 		      *     
 *************************************/

if(!empty($_POST))
{
	$errors = isValid($_POST); // check if form is valid -> return $errors array with errors
	$valid  = true;

	foreach ($errors as $value) 
	{
		if(!empty($value)) // if error exist
		{
			addError($value, $infosHeader); // insert error message
			$valid = false;
		}
	}

	if($valid) // if not errors
	{
		$user = addUser($_POST);
		if($user != false) //if user is add in bdd
		{
			// user added in db
			$_SESSION['id_user'] = $user['id_user'];
			$_SESSION['pseudo']  = $user['pseudo'];
			header("Location: index.php?notif=inscription");
			exit;
		}
	}
}

callView('header', $infosHeader);
callView('inscription', $infosHeader);
callView('footer');
?>