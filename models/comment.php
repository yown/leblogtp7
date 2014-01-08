<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

function getComments($id, $min = 0, $nb = 30)
{
	$link = connect(); // connexion bdd

	if(!empty($_SESSION['id_user']))
		$query = 'SELECT c.id_comment, c.id_user, c.content, c.created, u.pseudo,
				  IF(u.id_user = '.intval($_SESSION['id_user']).', 1, 0) as isAuthor
				  FROM comments c 
				  INNER JOIN users u 
				  ON c.id_user = u.id_user 
				  WHERE id_article = '.intval($id).'
				  ORDER BY created desc
				  LIMIT '.protectSQL($link, $min).', '.protectSQL($link, $nb);
	else
		$query = 'SELECT c.id_comment, c.id_user, c.content, c.created, u.pseudo
				  FROM comments c 
				  INNER JOIN users u 
				  ON c.id_user = u.id_user 
				  WHERE id_article = '.intval($id).'
				  ORDER BY created desc
				  LIMIT '.protectSQL($link, $min).', '.protectSQL($link, $nb);
	
	$value = mysqli_query($link ,$query);
	$result = mysqli_fetch_all($value, MYSQLI_ASSOC);
	mysqli_close($link);

	return $result;
}

function addComment($id_article, $content)
{
	$link  = connect();
	$query = 'INSERT INTO comments(id_article, id_user, content, created) VALUES(?, ?, ?, NOW())';
	
	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, "iis", $id_article, $_SESSION['id_user'], $content);
	
	$retour = mysqli_stmt_execute($result);
	mysqli_close($link);
	return $retour;
}

function editComment($id_comment, $comment)
{
	$link   = connect();
	$query  = 'UPDATE comments SET content = ? WHERE id_comment = ?)';
	
	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, "si", $id_comment, $content);
	
	$retour = mysqli_stmt_execute($result);
	mysqli_close($link);
	return $retour;
}

function deleteComment($id)
{
	$link = connect();
	$value = mysqli_query($link , 'DELETE FROM comments WHERE id_comment = '.protectSQL($link, $id));
	mysqli_close($link);
	return $value;
}

?>