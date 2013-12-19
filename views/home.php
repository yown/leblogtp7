<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

callView('header');

?>

	<!-- Menu avec les 5 derniers articles -->
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
<?php

callView('footer');

?>