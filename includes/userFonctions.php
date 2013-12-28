<?php 

/*
$infosHeader = array
(
	'id_user'       => (empty($_SESSION['id_user']) ? null : $_SESSION['id_user']),
*/

function userExist($pseudo, $mdp)
{
	$link = connect(); // connexion bdd

	$query = 'SELECT id_user, pseudo FROM users WHERE pseudo = "'.protectSQL($link, $pseudo).'" AND pass = "'.sha1(protectSQL($link, $mdp)).'"';

	$value = mysqli_query($link ,$query);
	$result = mysqli_fetch_assoc($value);
	
	return $result;
}

/* Check if Session == author -> updates articles or comments */
function isAuthor($pseudo_session, $pseudo_author)
{
	if($pseudo_session == $pseudo_author)
		return true;
	else
		return false;
}

?>