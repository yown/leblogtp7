<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

function getComments($id, $min = 0, $nb = 30)
{
	$link = connect(); // connexion bdd

	$query = 'SELECT c.id_comment, c.id_user, c.content, c.created, u.pseudo 
			  FROM comments c 
			  INNER JOIN users u 
			  ON c.id_user = u.id_user 
			  WHERE id_article = '.protectSQL($link, $id).'
			  LIMIT '.protectSQL($link, $min).', '.protectSQL($link, $nb);

	$value = mysqli_query($link ,$query);
	$result = mysqli_fetch_all($value, MYSQLI_ASSOC);
	mysqli_close($link);

	return $result;
}

function addComment()
{

}

function editComment()
{

}

function deleteComment()
{

}

?>