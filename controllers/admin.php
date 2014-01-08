<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

if(!empty($_SESSION['id_user']))
{
	$dataHome = array(
		'users' => getUser(),
		'ranks' => getRank()
	);

	if(isset($_POST))
	{
		if(editRank($_POST['id_user'], $_POST['id_rank']))
			header("Location: admin.php?notif=userRankEdit");
	}


	callView('header', $infosHeader);
	callView('admin', $dataHome);
	callView('footer');
}
else
	header("Location: index.php");
?>