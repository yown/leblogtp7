<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

if(!empty($_SESSION['id_user']))
{


	callView('header', $infosHeader);
	callView('admin', $infosHeader);
	callView('footer');
}
else
	header("Location: index.php");
?>