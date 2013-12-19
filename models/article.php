<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

function isValid($data, $statment == 'creation')
{
	if(!is_array($data))
		return (is_numeric($data) && $statment == 'delete'); // if $data is numeric and $statment == delete -> return true

	if($statment == 'creation')
		$requireData = array('id_user','title','image','content','id_category');
	
	elseif($statment == 'edit') 
		$requireData = array('id_user','title','image','content','id_category','id_article');


	$keyData = array_keys($data); // Get $data keys
	foreach ($requireData as $key => $value) 
		if(in_array($key)) // if $requiredata key is in $data
			if(empty($key))
				return false;

	return true;
}


function addArticle($data)
{
	$link = connect(); // connexion bdd

	$query = 'INSERT INTO articles (id_user, title, image, content, id_category, created, updated) value('.protectSQL($data['id_user']).','.protectSQL($data['title']).','.protectSQL($data['image']).','.protectSQL($data['content']).','.protectSQL($data['id_category']).', NOW(), NOW())';

	$value = mysqli_query($link ,$query);
	mysqli_close($link);
	return $value;
}

function editArticle($data)
{
	$link = connect();
	$query = 'UPDATE articles set id_user = '.protectSQL($data['id_user']).', title = '.protectSQL($data['title']).', image = '.protectSQL($data['image']).', content = '.protectSQL($data['content']).', id_category = '.protectSQL($data['id_category']).', udpdated = NOW() WHERE id_article = '.protectSQL($data['id_article']);

	$value = mysqli_query($link ,$query);
	mysqli_close($link);
	return $value;
}

function deleteArticle($id_article)
{
	$link = connect();
	$query = 'DELETE FROM articles WHERE id_article = '.protectSQL($id_article);

	$value = mysqli_query($link ,$query);
	mysqli_close($link);
	return $value;
}

?>