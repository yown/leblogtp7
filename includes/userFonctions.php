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
function isAuthor($id, $id2)
{
	return $id == $id2;
}


/* ----------------------------------------------
				Check user rank
------------------------------------------------*/
function getUserRank($id_user, $rank)
{
	$link = connect(); // connexion bdd

	$query = 'SELECT id_rank FROM users WHERE id_user = "'.protectSQL($link, $id_user).'" AND id_rank = "'.protectSQL($link, $rank).'"';
	$value = mysqli_query($link ,$query);
	$result = mysqli_fetch_assoc($value);
		
	if($result)
		return true;

	return false;	
}
?>