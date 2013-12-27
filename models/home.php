<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

function getArticles($min = 0, $max = 5, $complete = true)
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
	
	if($complete)
		foreach($result as &$article)
		{
			if($article['nb_comments'] > 0)
			{
				$query_comments = 'SELECT c.created as `date`, c.content, u.pseudo as author
								   FROM comments c
								   JOIN users u
								   ON u.id_user = c.id_user
								   ORDER BY `date` DESC
								   LIMIT 0,2';
				$valueComment = mysqli_query($link ,$query_comments);
				$resultComment = mysqli_fetch_all($valueComment, MYSQLI_ASSOC);
				$article['comments'] = $resultComment;
			}
		}
	mysqli_close($link);
	return $result;
}

?>