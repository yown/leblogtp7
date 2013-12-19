<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

// chech if form is not empty and valid
function isValid($form)
{
	if(empty($form['pseudo']) || empty($form['pass']) || empty($form['pass2']))
		return false;
	
	//check if pseudo already exist
	$link = connect();

	$query = 'SELECT pseudo FROM users WHERE pseudo = ?';
	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, "s", $form['pseudo']);
	mysqli_stmt_execute($result);
	mysqli_stmt_fetch($result);

	$pseudo_exist = mysqli_num_rows($result); // gives the number of matches of the query

	var_dump($pseudo_exist);
	if($pseudo_exist != 0) // if pseudo already exist
		return false;



	if($form['pass'] != $form['pass2'])
		return false;

	// hashage pass
	$pass = sha1($form['pass']);



	$query = 'INSERT INTO users (pseudo, pass, mail) value(?,?,?)';
	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, $form['pseudo'], $pass, $form['mail']);

	//close connection
	mysqli_close($link);
}
?>