<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

/* ----------------------------------------------
		chech if form is not empty and valid
------------------------------------------------*/
function isValid($form)
{
	$errors = array();

	// if inputs are empty
	if(empty($form['pseudo']) || empty($form['pass']) || empty($form['pass2']) || empty($form['mail']))
	{
		//add error in errors array
		if(empty($form['pseudo']))
			$errors[] = 'Vous devez saisir un pseudo';

		if(empty($form['pass']))
			$errors[] = 'Vous devez saisir un mot de pass';

		if(empty($form['pass2']))
			$errors[] = 'Vous devez saisir une confirmation de votre mot de passe';

		if(empty($form['mail']))
			$errors[] = 'Vous devez saisir une adresse email';

		return $errors;
	}
	
	
	//check if pseudo already exist
	$link = connect();

	$query = 'SELECT pseudo FROM users WHERE pseudo = ?';
	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, "s", $form['pseudo']);
	mysqli_stmt_execute($result);


	if(mysqli_stmt_fetch($result) != false) // if pseudo already exist
		$errors[] = 'Votre pseudo existe déjà. Merci d\'en chosir un autre';


	// check if pass != pass2
	if($form['pass'] != $form['pass2'])
		$errors[] = 'Vos deux mots de passe ne sont pas identiques';
	
		
	// if mail is not correct
	if(!filter_var($form['mail'], FILTER_VALIDATE_EMAIL))
		$errors[] = 'Votre adresse email n\'est pas valide';


	//close connection
	mysqli_close($link);

	return $errors;
}


/* ----------------------------------------------
			Add new user in bdd 
------------------------------------------------*/
function addUser($form)
{
	$link = connect();

	$pass = sha1($form['pass']); // hashage pass

	$query  = 'INSERT INTO users (pseudo, pass, mail) value(?,?,?)';
	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, "sss", $form['pseudo'], $pass, $form['mail']);
	$signUp = mysqli_stmt_execute($result);

	if(empty($signUp))
		return false;
	
	$idQuery  = 'SELECT id_user, pseudo FROM users WHERE id_user = (SELECT max(id_user) as id FROM users)';
	$response = mysqli_query($link, $idQuery);
	$return   = mysqli_fetch_assoc($response);
	
	mysqli_close($link);
	
	return (empty($return['id'])) ? $return : false;
}
?>