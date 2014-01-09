<?php 

/*
* return (exist) ? array : null, the user doest it exist
*/
function userExist($pseudo, $mdp)
{
	$link   = connect(); // connexion bdd

	$query  = 'SELECT id_user, pseudo FROM users WHERE pseudo = "'.protectSQL($link, $pseudo).'" AND pass = "'.sha1(protectSQL($link, $mdp)).'"';

	$value  = mysqli_query($link ,$query);
	$result = mysqli_fetch_assoc($value);
	
	return $result;
}

/* Check if Session == author -> updates articles or comments */
// depreciated, isAuthor is uses in query anymore
function isAuthor($id, $id2)
{
	return $id == $id2;
}


/*
*  set user rank into session
*/
function rankSession($id_user)
{
	$link    = connect(); // connexion bdd

	$query   = 'SELECT id_rank FROM users WHERE id_user = "'.protectSQL($link, $id_user).'"';
	$value   = mysqli_query($link ,$query);
	$result  = mysqli_fetch_assoc($value);
		
	$_SESSION['rank'] = $result['id_rank'];
}
?>