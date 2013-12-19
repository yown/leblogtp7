<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

//echo $helloMotherFuckingWorld.'<br>';

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
	<link rel="stylesheet" href="fonts/style_font.css">
</head>
<body>
	<!-- header -->
	<header id="header">
		<div class="content">
			<p id="logo" class="left"><a href="#"><img src="images/logo.png" alt="Black Wave"> <span>Black Wave</span></a></p>
			<ul id="categories_header" class="left">
				<li>Categorie 1</li>
				<li>Categorie 2</li>
				<li>Categorie 3</li>
			</ul>
			<nav>
				<ul id="connexion_inscription" class="right">
					<li><a href="#">Inscription</a></li>
					<li id="lien_connexion">
						<a href="#">Connexion<span class="icon-arrow-down"></span></a>
						<ul id="bloc_connexion">
							<li>
								<form action="#" method="POST">
									<p>
										<input type="text" name="pseudo" placeholder="Login">
									</p>
									<p>
										<input type="password" name="pass" placeholder="Mot de passe">
									</p>
									<p>
										<label for="co_auto">Connection auto : </label>
										<input type="checkbox" name="co_auto" id="co_auto" />
									</p>
									<p>
										<input type="submit" value="Connection">
									</p>
								</form>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- infobules -->
	<div class="infobulle valide">
		<p>
			Vous êtes maintenant connecté ! <span class="right croix_infobule"><a href="#"><span class="icon-cross"></span></a></span
		</p>
	</div>
	<div class="infobulle erreur">
		<p>
			Une erreur est surveneue ! <span class="right croix_infobule"><a href="#"><span class="icon-cross"></span></a></span>
		</p>
	</div>
	<div class="infobulle information">
		<p>
			Petite informatiooooonnn !!!! <span class="right croix_infobule"><a href="#"><span class="icon-cross"></span></a></span>
		</p>
	</div>

	<!-- Menu avec les 5 derniers articles -->
	<div class="content marge-top">
		<section id="menu_gauche" class="left">
			<h1>Derniers articles</h1>
			<div id="content_menu_gauche">
				<!-- apercus article -->
				<div class="apercus_article_menu_gauche">
					<div class="image_apercus left">
						<img src="http://placekitten.com/70/70" alt="">
					</div>
					<p class="apercus_titre"><a href="#"><strong>Titre article</strong></a></p>
					<p class="apercus_comments left"><a href="#"><span class="icon-comments"></span> 20</a></p>
					<p class="apercus_auteur right"><a href="#"><span class="icon-users"></span> Auteur</a></p>
				</div>
				<div class="apercus_article_menu_gauche">
					<div class="image_apercus left">
						<img src="http://placekitten.com/70/70" alt="">
					</div>
					<p class="apercus_titre"><a href="#"><strong>Titre article</strong></a></p>
					<p class="apercus_comments left"><a href="#"><span class="icon-comments"></span> 20</a></p>
					<p class="apercus_auteur right"><a href="#"><span class="icon-users"></span> Auteur</a></p>
				</div>
				
			</div>
		</section>

		<section id="content_articles" class="right">
			<article class="article">
				<!-- image article -->
				<div class="bloc_image_article">
					<img src="http://placekitten.com/650/200" alt="">
				</div>
				<!-- contenu article -->
				<div class="apercus_infos_article">
					<p class="bloc_infos_article right">
						<a href="#"><span class="icon-users"></span> Auteur</a> - 
						<span class="icon-calendar"></span> Date
					</p>
					<h1><a href="#">Titre Article</a></h1>
					<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte [...]</p>
					<hr>
					<!-- commentaires -->
					<div class="commentaire">
						<p class="infos_commentaire">Auteur <span class="right"><span class="icon-calendar"></span> Date</span></p>
						<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500</p>
					</div>
					<div class="commentaire">
						<p class="infos_commentaire">Auteur <span class="right"><span class="icon-calendar"></span> Date</span></p>
						<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500</p>
					</div>
					<hr>
					<!-- boutons commentaire -->
					<p>
						<a href="#">Voir plus</a>
						<span class="edit_commentaire">
							<a href="#"><span class="icon-compose"></span> Editer</a> 
							<a href="#"><span class="icon-cross2"></span> Supprimer</a>
						</span>
						<a class="right" href="#"><span class="icon-comments"></span> 20</a>
					</p>
				</div>

			</article>
		</section>
	</div>
</body>
</html>