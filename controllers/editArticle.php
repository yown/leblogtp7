<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

/*$dataHome = array(
	'recent_articles' => getLastArticles(0 , 5),
	'article' => getArticle($_GET['id']),
	'comments' => getComments($_GET['id'])
 );*/

$dataHome = "";

callView('header', $infosHeader);
callView('editArticle', $dataHome);
?>