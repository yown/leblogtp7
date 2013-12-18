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
			<p id="logo"><img src="images/logo.png" alt="Black Wave"> <span>Black Wave</span></p>
			<ul id="categories_header">
				<li>Categorie 1</li>
				<li>Categorie 2</li>
				<li>Categorie 3</li>
			</ul>
			<nav>
				<ul id="connexion_inscription">
					<li><a href="#">Connexion<span class="icon-arrow-down"></span></a></li>
					<li><a href="#">Inscription</a></li>
				</ul>
			</nav>
		</div>
	</header>
	
	<!-- Menu avec les 5 derniers articles -->
	<div class="content">
		<section id="menu_gauche">
			<h1>Derniers articles</h1>
			<!-- apercus article -->
			<div class="apercus_article_menu_gauche">
				<img src="images/test_mini_image.png" alt="test">
				<p class="apercus_titre"><a href="#"><strong>Titre article</strong></a></p>
				<p class="apercus_comments"><a href="#"><span class="icon-comments"></span> 20</a></p>
				<p class="apercus_auteur"><a href="#"><span class="icon-users"></span> Auteur</a></p>
			</div>
		</section>

		<section id="content_articles">
			<article class="article">
				<div class="bloc_image_article">
					<img src="http://placekitten.com/650/200" alt="">
				</div>
				<div class="apercus_infos_article">
					<p class="bloc_infos_article">
						<a href="#"><span class="icon-users"></span> Auteur</a>
						<a href="#"><span class="icon-calendar"></span> Date</a>
					</p>
					<h1>Titre Article</h1>
					<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte</p>
					<hr>
				</div>

			</article>
		</section>
	</div>
</body>
</html>