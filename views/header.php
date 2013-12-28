<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Morel Nicolas - Rousseau Kévin">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>Black Wave</title>
	<link rel="stylesheet" href="styles/style.css">
	<!-- font -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/script.js"> </script>
	<link rel="stylesheet" href="fonts/style_font.css">
</head>
<body>
	<!-- header -->
	<header id="header">
		<div class="content">
			<p id="logo" class="left"><a href="index.php"><img src="images/logo.png" alt="Black Wave"> <span>Black Wave</span></a></p>
			<ul id="categories_header" class="left">
				<li>Categorie 1</li>
				<li>Categorie 2</li>
				<li>Categorie 3</li>
			</ul>
			<nav>
				<ul id="connexion_inscription" class="right">
			<?php
				if(empty($_SESSION['pseudo']))
					echo '
						<li><a href="index.php?action=inscription">Inscription</a></li>
						<li id="lien_connexion">
							<a href="#">Connexion<span class="icon-arrow-down"></span></a>
							<ul id="bloc_connexion">
								<li>
									<form action="index.php" method="POST">
										<p>
											<input type="text" name="pseudo" placeholder="Login">
										</p>
										<p>
											<input type="password" name="pass" placeholder="Mot de passe">
										</p>
										<p>
											<label for="co_auto">Connexion auto : </label>
											<input type="checkbox" name="co_auto" id="co_auto" />
										</p>
										<p>
											<input type="submit" name="login" value="Connexion">
										</p>
									</form>
								</li>
							</ul>
						</li>';
				else
					echo $_SESSION['pseudo'].' <li><a href="index.php?logout">Déconnexion</a></li>';
				?>
				</ul>
			</nav>
		</div>
	</header>
	<!-- infobules -->
	<?php
		$i=0;
		if(!empty($notifications))
			foreach($notifications as $type => $notification)
				foreach($notification as $message)
					echo '
						<div id="notif'.$i.'" onclick="closeNotification('.$i++.')" class="infobulle '.$type.'">
							<p>
								'.$message.' <span class="right croix_infobule"><a href="#"><span class="icon-cross"></span></a></span>
							</p>
						</div>
					';
	?>
	<div class="content marge-top">