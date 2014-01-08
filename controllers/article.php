<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

$article = getArticle(intval($_GET['id']));

$dataHome = array(
	'article' => $article,
	'similar_articles' => getSimilar($article['id_cat'] ,0 , 5),
	'comments' => getComments(intval($_GET['id']))
 );

if(isset($_GET['notif']))
{
 	if($_GET['notif'] == 'editArticle')
 		addValidation('Votre article a bien été modifié !', $infosHeader);
	if($_GET['notif'] == 'editComment')
 		addValidation('Votre article a bien été modifié !', $infosHeader);
	if($_GET['notif'] == 'deleteComment')
 		addValidation('Votre article a bien été supprimé !', $infosHeader);
	if($_GET['notif'] == 'addComment')
 		addValidation('Votre article a bien été ajouté !', $infosHeader);
}

if(isset($_GET['comment']))
{
	if($_GET['comment'] == 'add' && !empty($_POST['content']))
	{
		if(addComment($article['id_article'], $_POST['content']))
			header("Location: index.php?action=article&amp;notif=addComment&amp;id=".$article['id_article']);
		else
			addError("OOppps, cette erreur est normalement impossible", $infosHeader);
	}
}

callView('header', $infosHeader);
callView('article', $dataHome);
callView('footer');
?>