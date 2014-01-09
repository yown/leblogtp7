<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

// check if id_user is an admin -> return true or false
$access = getUserRank($_SESSION['id_user'], 1);

if(!empty($_SESSION['id_user']) && $access)//if is admin
{
	$dataHome = array(
		'users' => getUser(),
		'ranks' => getRank()
	);

	if(!empty($_POST))
	{
		$errors = isValid($_POST); // check if form is valid -> return $errors array with errors
		$valid = true;

		foreach ($errors as $value) 
		{
			addError($value, $infosHeader); // insert error message
			$valid = false;
		}

		if($valid) // if not errors
		{
			if(editRank($_POST['id_user'], $_POST['id_rank']))
				header("Location: index.php?action=admin&notif=editRank");
		}
	}

	// if notifications
	if(isset($_GET['notif']))
	{
		if(htmlspecialchars($_GET['notif']) == 'editRank')
	 		addValidation('Le type de compte a bien été modifié !', $infosHeader);
	}

	callView('header', $infosHeader);
	callView('admin', $dataHome);
	callView('footer');
}
else
	header("Location: index.php");
?>