<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

require_once('models/comment.php');

function getArticles($min, $nb, $complete = true)
{
	$link = connect(); // connexion bdd

	//IF(u.id_user = '.intval($_SESSION['id_user']).', 1, 0) as \'isAuthor\',
	//Ca plante si le mec est pas connecté
	$query = 'SELECT a.id_article as id, a.image, u.pseudo as author, a.created as `date`, a.title, a.content,
			  (SELECT count(id) FROM comments WHERE id_user = a.id_article)as nb_comments
			  FROM articles a
			  JOIN users u
			  ON a.id_user = u.id_user
			  ORDER BY `date` DESC, nb_comments
			  LIMIT '.protectSQL($link, $min).', '.protectSQL($link, $nb).'';

	$value = mysqli_query($link ,$query);
	$result = mysqli_fetch_all($value, MYSQLI_ASSOC);
	
	if($complete)
		foreach($result as &$article)
		{
			if($article['nb_comments'] > 0)
			{				
				$article['comments'] = getComments($article['id'], 0, 2);
			}
		}
	mysqli_close($link);
	return $result;
}

function getNbPage()
{
	$link = connect();
	
	$value = mysqli_query($link, "SELECT COUNT(id_article) as 'nombre' FROM articles");
	$result = mysqli_fetch_assoc($value);
	return ($result['nombre'] / NBARTICLEBYPAGE) + 1;
}
?>