<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');


//require_once('model/comment.php');

function isValid($form, $statment = 'creation')
{

	if(!is_array($form))
		return (is_numeric($data) && $statment == 'delete'); // if $data is numeric and $statment == delete -> return true

	$errors = array();

	// if Add article
	if($statment == 'creation')
	{
		// if inputs are empty
		if(empty($form['title']) || empty($form['content']))
		{
			if(empty($form['title']))
				$errors[] = 'Vous devez saisir un titre pour votre article';

			if(empty($form['content']))
				$errors[] = 'Le contenu de votre article ne peu pas être vide';
		}

		if($_FILES['image']['size'] != 0)
		{
			if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
	        {
	            // Testons si le fichier n'est pas trop gros
	            if ($_FILES['image']['size'] <= 1000000)
	            {
	                // Testons si l'extension est autorisée
	                $infosfichier = pathinfo($_FILES['image']['name']);
	                $extension_upload = $infosfichier['extension'];
	                $extensions_autorisees = array('jpg', 'jpeg', 'png');
	                if (in_array($extension_upload, $extensions_autorisees))
	                {
	                    // On peut valider le fichier et le stocker définitivement
	                    move_uploaded_file($_FILES['image']['tmp_name'], 'images/uploads/' . basename($_FILES['image']['name']));
	                    echo "L'envoi a bien été effectué !";
	                }
	                else
	                $errors[] = 'L\'extention de votre image n\'est pas autorisée. (Seulement jpeg, jpg, png)';
	        	}
	            else $errors[] = 'Le poid de votre image est trop important';
	        }
	        else
	        	$errors[] = 'Une erreur est survenue lors du telechargement de votre image';
	    }
	    else
	    	$errors[] = 'Vous devez importer une image de couverture pour votre article';
	}
	
	return $errors;
}

function getCategories()
{
	$link = connect(); // connexion bdd

	$requete = 'SELECT id_cat, name FROM categories ORDER BY name';
	$query = mysqli_query($link, $requete) or die("Error ".mysqli_error($link));
	$result = mysqli_fetch_all($query, MYSQLI_ASSOC) or die("Error ".mysqli_error($link));
	mysqli_close($link);
	return $result;
}

function addArticle($data)
{
	$link = connect(); // connexion bdd

	// add image
	move_uploaded_file($_FILES['image']['tmp_name'], 'images/uploads/' . basename($_FILES['image']['name']));
	$query = 'INSERT INTO articles (id_user, title, image, content, id_cat, created, updated) value(?,?,?,?,?, NOW(), NOW())';

	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, "sssss", $_SESSION['id_user'], $data['title'], $_FILES['image']['name'], $data['content'], $data['id_cat']);
	mysqli_stmt_execute($result);

	mysqli_close($link);
	var_dump($result);
	return $result;
}

function getArticle($id)
{
	$link = connect(); // connexion bdd

	$query = 'SELECT a.id_article, a.id_user, a.title, a.image, a.content, a.id_cat, a.created, u.pseudo FROM articles a INNER JOIN users u ON a.id_user = u.id_user WHERE id_article = '.protectSQL($link, $id);

	$value = mysqli_query($link ,$query);
	$result = mysqli_fetch_assoc($value);
	mysqli_close($link);
	return $result;
}	

function editArticle($data)
{
	$link = connect();
	$query = 'UPDATE articles set title = ?, image = ?, content = ?, id_cat = ?, updated = NOW() WHERE id_article = ?';

	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, "sssss", $data['title'], $data['image'], $data['content'], $data['id_cat'], $data['id_article']);
	mysqli_stmt_execute($result);

	mysqli_close($link);
	var_dump($result);
	return $result;
}

function deleteArticle($id_article)
{
	$link = connect();
	$query = 'DELETE FROM articles WHERE id_article = ?';

	$result = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($result, "s", $id_article);
	mysqli_stmt_execute($result);

	mysqli_close($link);
	return $result;
}

?>