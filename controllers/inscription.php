<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

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
		if(addUser($_POST)) //if user is add in bdd
		{
			// add user in bdd
			header("Location: index.php?notif=inscription");
			exit;
		}
	}
}

callView('header', $infosHeader);
callView('inscription', $infosHeader);
callView('footer');
?>