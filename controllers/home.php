<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

 // Libs ans Models Automaticly loaded at APPPATH/libs and APPPATH/models if names are the identicals 

if(isset($_GET['logout']))
{
	$_SESSION['id_user']    = '';
	$_SESSION['pseudo']     = '';
}
 
// if notifications
if(isset($_GET['notif']))
{
	if(htmlspecialchars($_GET['notif']) == 'inscription')
 		addValidation('Vous êtes maintenant inscrit sur Blackwave. Surfez !', $infosHeader);
 	
	if(htmlspecialchars($_GET['notif']) == 'newArticle')
 		addValidation('Votre article a bien été ajouté !', $infosHeader);

 	if(htmlspecialchars($_GET['notif']) == 'deleteArticle')
 		addValidation('Votre article a bien été supprimé !', $infosHeader);
}

 // addInformation('Les truc de notif sont good', $infosHeader);
 // addError('on peut même dire qu\'il est pas content', $infosHeader);
 
if(isset($_POST['login']))
{
	if(empty($_POST['pseudo']) OR empty($_POST['pass']))
		addError('Hum, un des champ de connexion est vide', $infosHeader);
	else
	{
		$userExist = userExist($_POST['pseudo'], $_POST['pass']);
		if(!empty($userExist['id_user']))
		{
			addValidation("Félicitation vous êtes connecté", $infosHeader);
			$_SESSION['id_user']    = $userExist['id_user'];
			$_SESSION['pseudo']     = $userExist['pseudo'];
		}
		else
			addError('Hum, ces identifiants sont faux', $infosHeader);
	}
}

$nbPage = getNbPage();
$minArticle = 0; 
if(!empty($_GET['page']))
{
	//si non numerique ou pas compris dans les pages possibles
	if(!is_numeric($_GET['page']) || (( (int)$_GET['page'] ) <= 0 || ( (int)$_GET['page'] ) > $nbPage ))
		show404();
		
	$minArticle = NBARTICLEBYPAGE * (( (int) $_GET['page'] ) - 1);
} 
$dataHome = array(
	'recent_articles' => getArticles(0 , 5, false),
	'articles'        => getArticles($minArticle, NBARTICLEBYPAGE),
	'nb_pages'        => $nbPage 
);
 
// okay appelons la vue
callView('header', $infosHeader);
callView('home'  , $dataHome); 

?>