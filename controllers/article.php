<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

$article = getArticle(intval($_GET['id']));

$dataHome = array(
	'article' => $article,
	'similar_articles' => getSimilar($article['id_cat'] ,0 , 5),
	'comments' => getComments(intval($_GET['id']))
 );

if(isset($_GET['notif']))
{
 	if(htmlspecialchars($_GET['notif']) == 'editArticle')
 		addValidation('Votre article a bien été modifié !', $infosHeader);
}

callView('header', $infosHeader);
callView('article', $dataHome);
callView('footer');
?>