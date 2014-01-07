<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');


?>

	<!-- Menu avec les 5 derniers articles -->
		<section id="menu_gauche" class="left">
			<h1>Derniers articles</h1>
			<div id="content_menu_gauche">
				<!-- apercus article -->
				<?php
				foreach($recent_articles as $recent_article) // for every articles
				{
				?>
					<div class="apercus_article_menu_gauche">
						<div class="image_apercus left">
							<img src="<?php echo $recent_article['image'];?>" alt="<?php echo $recent_article['title'];?>">
						</div>
						<p class="apercus_titre"><a href="#"><strong><?php echo $recent_article['title'];?></strong></a></p>
						<p class="apercus_comments left"><a href="#"><span class="icon-comments"></span> <?php echo $recent_article['nb_comments'];?></a></p>
						<p class="apercus_auteur right"><a href="#"><span class="icon-users"></span> <?php echo $recent_article['author'];?></a></p>
					</div>
				<?php
				}
				?>
				
			</div>
		</section>

		<section id="content_articles" class="right">
			
		<?php
			foreach($articles as $article) // for every articles
			{
		?>
			<article class="article">
				<!-- image article -->
				<div class="bloc_image_article">
					<img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>">
				</div>
				<!-- contenu article -->
				<div class="apercus_infos_article">
					<p class="bloc_infos_article right">
						<a href="#"><span class="icon-users"></span> <?php echo $article['author']; ?></a> - 
						<span class="icon-calendar"></span> <?php echo toDate($article['date']); ?>
					</p>
					<h1><a href="#"><?php echo $article['title']; ?></a></h1>
					<p><?php echo $article['content']; ?></p>
					<hr>
					<!-- commentaires -->
			<?php 
				if($article['nb_comments'] > 0)
					foreach($article['comments'] as $comment)
					{
				?>
						<div class="commentaire">
							<p class="infos_commentaire"><?php echo $comment['author']; ?> <span class="right"><span class="icon-calendar"></span> <?php echo toDate($comment['date']); ?></span></p>
							<p><?php echo $comment['content']; ?></p>
						</div>
				<?php
					}
				else
					echo 'Aucun commentaire';
			?>
					<hr>
					<!-- boutons commentaire -->
					<p>
						<a href="index.php?action=article&id=<?php echo $article['id']; ?>">Voir plus</a>
						<?php
						if(!empty($_SESSION['pseudo']))
							if(isAuthor($_SESSION['pseudo'], $article['author'])) 
							{
								echo '
									<span class="edit_commentaire">
										<a href="index.php?action=editArticle&statment=edit&id_article='.$article['id'].'"><span class="icon-compose"></span> Editer</a> 
										<a href="index.php?action=editArticle&statment=delete&id_article='.$article['id'].'"><span class="icon-cross2"></span> Supprimer</a>
									</span>';
							}
						?>
						<a class="right" href="#"><span class="icon-comments"></span> <?php echo $article['nb_comments']; ?></a>
					</p>
				</div>
			</article>
		<?php
			} // end foreach
		?>
		</section>
<?php

callView('footer');

?>