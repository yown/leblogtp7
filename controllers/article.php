<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

 /*************************************
 *               INIT			      *     
 *************************************/

if(!is_numeric($_GET['id'])) // if the id is not numeric, well it's not an id
	show404();

$article = getArticle(intval($_GET['id'])); //we load the article

if(empty($article)) // if the article does not match : id does not exist
	show404();

	// array given to the view
$dataHome = array(
	'article'          => $article,
	'similar_articles' => getSimilar($article['id_cat'] ,0 , 5), // get "tu va kiffer" selection
	'comments'         => getComments(intval($_GET['id'])) // fetch all comment usable for this article
 );

 /*************************************
 *           NOTIFICATIONS		      *     
 *************************************/
 
if(isset($_GET['notif'])) // if we have to display some notifications
{
 	if($_GET['notif'] == 'editArticle')
 		addValidation('Votre article a bien été modifié !', $infosHeader);
	if($_GET['notif'] == 'editComment')
 		addValidation('Votre commentaire a bien été modifié !', $infosHeader);
	if($_GET['notif'] == 'deleteComment')
 		addValidation('Votre commentaire a bien été supprimé !', $infosHeader);
	if($_GET['notif'] == 'addComment')
 		addValidation('Votre commentaire a bien été ajouté !', $infosHeader);
}

 /*************************************
 *               Actions		      *     
 *************************************/

 //if the guy want to do something with comment and is connected
if(isset($_GET['comment']) && !empty($_SESSION['id_user']))
{
	// if he want to add one and $_POST something out
	if($_GET['comment'] == 'add' && !empty($_POST['content']))
	{
		//well we can add his comment and tell him thats done or not
		if(addComment($article['id_article'], $_POST['content']))
		{
			header("Location: index.php?id=".$article['id_article']."&action=article&notif=addComment");
			exit;
		}
		else
			addError("OOppps, cette erreur est normalement impossible", $infosHeader);
	}
	// if this guy want dit or delete, he had to be the author or admin
	else if(!empty($article['isAuthor']) || $_SESSION['rank'] == 1) 
	{
		//well that's kind of simple, we delete the '$_GET['commentId']' comment
		if($_GET['comment'] == 'delete' && !empty($_GET['commentId']))
		{
			//lets delete
			if(deleteComment($_GET['commentId']))
			{
				header("Location: index.php?id=".$article['id_article']."&action=article&notif=deleteComment");
				exit;
			}
			else
				addError("OOppps, cette erreur est normalement impossible", $infosHeader);
		}
		//he had to be the author or admin too
		else if($_GET['comment'] == 'edit' && !empty($_GET['commentId']) && !empty($_POST['content']))
		{
			//s'il est valide et a lui
			if(editComment($_GET['commentId'], $_POST['content']))
			{
				header("Location: index.php?id=".$article['id_article']."&action=article&notif=editComment");
				exit;
			}
			else
				addError("OOppps, cette erreur est normalement impossible", $infosHeader);
		}
	}
}

 /*************************************
 *             LETS BOOT		      *     
 *************************************/

callView('header', $infosHeader);
callView('article', $dataHome);
callView('footer');
?>