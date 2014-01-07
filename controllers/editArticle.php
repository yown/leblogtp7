<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

$dataHome = array(
	'categories' => getCategories(),
	'article' => array(
		'id_article' => "",
		'title' => "",
		'id_cat' => "",
		'content' => ""
		)
 );


// if add an article
if(isset($_GET['statment']) && (htmlspecialchars($_GET['statment']) == 'new'))
{
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

		if($valid) // if not errors
		{
			if(addArticle($_POST))
			{
				// add article in bdd
				header("Location: index.php?notif=newArticle");
			}
		}
	}
}

// if edit article
if(isset($_GET['statment']) && (htmlspecialchars($_GET['statment']) == 'edit'))
{
	$infosArticle = getArticle($_GET['id_article']);

	// if is author -> update
	if(isAuthor($_SESSION['id_user'], $infosArticle['id_user'])) 
	{

		$dataHome = array(
		'categories' => getCategories(),
		'article' => array(
			'id_article' => $infosArticle['id_article'],
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
					echo "edit";
					// add article in bdd
					header("Location: index.php?action=article&id=".$_POST['id_article']."&notif=editArticle");
				}
			}
		}
	}
	// if not author
	else
		header("Location: index.php?action=home");
}

callView('header', $infosHeader);
callView('editArticle', $dataHome);
?>