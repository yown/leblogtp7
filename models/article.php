<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

function isValid($data, $statment = 'creation')
{
	if(!is_array($data))
		return (is_numeric($data) && $statment == 'delete'); // if $data is numeric and $statment == delete -> return true

	if($statment == 'creation')
		$requireData = array('id_user','title','image','content','id_category');
	
	elseif($statment == 'edit') 
		$requireData = array('id_user','title','image','content','id_category','id_article');


	$keyData = array_keys($data); // Get $data keys
	foreach ($requireData as $key => $value) 
		if(in_array($key)) // if $requiredata key is in $data
			if(empty($key))
				return false;

	return true;
}

/* Last articles in menu */
function getLastArticles($min = 0, $max = 5)
{
	$link = connect(); // connexion bdd

	$query = 'SELECT a.id_article as id, a.image, u.pseudo as author, a.created as `date`, a.title, a.content, 
			  (SELECT count(id) FROM comments WHERE id_user = a.id_article)as nb_comments
			  FROM articles a
			  JOIN users u
			  ON a.id_user = u.id_user
			  ORDER BY `date` DESC, nb_comments
			  LIMIT '.protectSQL($link, $min).', '.protectSQL($link, $max).'';

	$value = mysqli_query($link ,$query);
	$result = mysqli_fetch_all($value, MYSQLI_ASSOC);
	mysqli_close($link);
	return $result;
}

/* ----------  show article and comments ---------- */
function getArticle($id)
{
	$link = connect(); // connexion bdd

	$query = 'SELECT a.id_user, a.title, a.image, a.content, a.created, u.pseudo FROM articles a INNER JOIN users u ON a.id_user = u.id_user WHERE id_article = '.protectSQL($link, $id);

	$value = mysqli_query($link ,$query);
	$result = mysqli_fetch_assoc($value);
	mysqli_close($link);
	return $result;
}

function getComments($id)
{
	$link = connect(); // connexion bdd

	$query = 'SELECT c.id_comment, c.id_user, c.content, c.created, u.pseudo FROM comments c INNER JOIN users u ON c.id_user = u.id_user WHERE id_article = '.protectSQL($link, $id);

	$value = mysqli_query($link ,$query);
	$result = mysqli_fetch_all($value, MYSQLI_ASSOC);
	mysqli_close($link);

	return $result;
}

?>