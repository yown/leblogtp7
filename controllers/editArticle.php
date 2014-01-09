<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

 /*************************************
 *               INIT			      *     
 *************************************/

$dataHome = array(
	'categories' => getCategories(),
	'article' => array(
		'id_article' => "",
		'title' => "",
		'id_cat' => "",
		'content' => ""
	)
);

 /*************************************
 *               Actions		      *     
 *************************************/
//if he (is connected and he is a blogger) or (is connected and admin)
if(!((!empty($_SESSION['id_user']) && $_SESSION['rank'] == 2) || (!empty($_SESSION['id_user']) && $_SESSION['rank'] == 1)))
{
	header("Location: index.php");
	exit;
}

// if add an article
if(isset($_GET['statment']) && ($_GET['statment'] == 'new'))
{
	if(!empty($_POST))
	{
		$dataHome = array(
			'categories' => getCategories(),
			'article' => array(
				'title' => $_POST['title'],
				'id_cat' => $_POST['id_cat'],
				'content' => $_POST['content']
				)
		 );

		$errors = isValid($_POST); // check if form is valid -> return $errors array with errors
		$valid = true;

		foreach ($errors as $value) 
		{
				addError($value, $infosHeader); // insert error message
				$valid = false;
		}

		if($valid) // if not errors
		{
			if(addArticle($_POST))
			{
				// add article in bdd
				header("Location: index.php?notif=newArticle");
				exit;
			}
		}
	}
}

// if edit article
if(isset($_GET['statment']) && ($_GET['statment'] == 'edit'))
{

	$infosArticle = getArticle($_GET['id_article']);
	$idUser_article = $infosArticle['id_user'];

	// if is author -> update
	if($idUser_article == $_SESSION['id_user'] || $_SESSION['rank'] == 1) 
	{

		$dataHome = array(
		'categories' => getCategories(),
		'article' => array(
			'id_article' => $infosArticle['id_article'],
			'image' => $infosArticle['image'],
			'title' => $infosArticle['title'],
			'id_cat' => $infosArticle['id_cat'],
			'content' => $infosArticle['content']
			)
		);

		if(!empty($_POST))
		{
			$errors = isValid($_POST); // check if form is valid -> return $errors array with errors
			$valid = true;

			foreach ($errors as $value) 
			{
				if(!empty($value)) // if error exist
				{
					addError($value, $infosHeader); // insert error message
					$valid = false;
				}
			}

			// new value 
			$nouv = array(
				'id_article' => $infosArticle['id_article'],
				'title' => htmlspecialchars($_POST['title']),
				'id_cat' => htmlspecialchars($_POST['id_cat']),
				'content' => $_POST['content']
			);

			$dataHome = array(
				'categories' => getCategories(),
				'article' => $nouv
			 );

			if($valid) // if not errors
			{
				if(editArticle($_POST))
				{
					// add article in bdd
					header("Location: index.php?action=article&id=".$_POST['id_article']."&notif=editArticle");
					exit;
				}
			}
		}
	}
	// if not author
	else
	{
		header("Location: index.php?action=home");
		exit;
	}
}

// if delete article
if(isset($_GET['statment']) && ($_GET['statment'] == 'delete'))
{
	$infosArticle = getArticle($_GET['id_article']);
	$idUser_article = $infosArticle['id_user'];

	if($idUser_article == $_SESSION['id_user'] || $_SESSION['rank'] == 1)
	{
		deleteArticle(htmlspecialchars($_GET['id_article']));
		header("Location: index.php?action=home&notif=deleteArticle");
		exit;
	}
	else
	{
		header("Location: index.php?action=home");
		exit;
	}
}

callView('header', $infosHeader);
callView('editArticle', $dataHome);
callView('footer');

?>