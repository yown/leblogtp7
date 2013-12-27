<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');


if(!empty($_POST))
{

	$errors = isValid($_POST); // check if form is valid -> return $errors array with errors
	$valid = true;

	foreach ($errors as $key => $value) 
	{
		if($value != '') // if error exist
		{
			addError($value, $infosHeader); // insert error message
			$valid = false;
		}
	}

	if($valid == true) // if not errors
	{
		if(addUser($_POST))
		{
			// add user in bdd
			header("Location: index.php?notif=inscription");
			$_SESSION['id_user']    = $userExist['id_user']; // we set SESSION and current pseudo / id
			$_SESSION['pseudo']     = $userExist['pseudo'];
		}
	}


}

callView('header', $infosHeader);
callView('inscription', $infosHeader);
?>