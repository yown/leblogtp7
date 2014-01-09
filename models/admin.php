<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

/* ----------------------------------------------
			check if form is valid
------------------------------------------------*/
function isValid($form)
{
	$errors = array();

	if($form['id_user'] == 0)
		$errors[] = 'Vous devez selectionner un pseudo';

	if($form['id_rank'] == 0)
		$errors[] = 'Vous devez selectionner le type de compte a affecter';

	return $errors;
}

/* ----------------------------------------------
				get all user 
------------------------------------------------*/
function getUser()
{
	$link = connect(); // connexion bdd

	$requete = 'SELECT id_user, pseudo FROM users ORDER BY pseudo';
	$query = mysqli_query($link, $requete) or die("Error ".mysqli_error($link));
	$result = mysqli_fetch_all($query, MYSQLI_ASSOC) or die("Error ".mysqli_error($link));
	mysqli_close($link);
	return $result;
}

/* ----------------------------------------------
				get all rank 
------------------------------------------------*/
function getRank()
{
	$link = connect(); // connexion bdd

	$requete = 'SELECT id_rank, name FROM ranks ORDER BY name';
	$query = mysqli_query($link, $requete) or die("Error ".mysqli_error($link));
	$result = mysqli_fetch_all($query, MYSQLI_ASSOC) or die("Error ".mysqli_error($link));
	mysqli_close($link);
	return $result;
}

/* ----------------------------------------------
			edit rank for user
------------------------------------------------*/
function editRank($id_user, $id_rank)
{
	$link = connect();
	$query = 'UPDATE users set id_rank = ? WHERE id_user = ?';
	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, "ss", $id_rank, $id_user);
	mysqli_stmt_execute($result);

	mysqli_close($link);
	return $result;
}
?>