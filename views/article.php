<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');?>

	<!-- Menu avec les 5 derniers articles -->
		<section id="menu_gauche" class="left kiffe">
			<h1>Tu vas kiffer :</h1>
			<p class="small">Dans la catégorie <?php echo $article['name_cat'];?></p>
			<div id="content_menu_gauche">
				<!-- apercus article -->
				<?php
				foreach($similar_articles as $similar_article) // for every articles
				{
				?>
					<div class="apercus_article_menu_gauche" onclick="window.location.href='index.php?action=article&amp;id=<?php echo $similar_article['id']; ?>'">
						<div class="image_apercus left">
							<img src="images/uploads/<?php echo $similar_article['image'];?>" alt="<?php echo $similar_article['title'];?>">
						</div>
						<p class="apercus_titre"><a href="#"><strong><?php echo $similar_article['title'];?></strong></a></p>
						<p class="apercus_comments left"><a href="#"><span class="icon-comments"></span> <?php echo $similar_article['nb_comments'];?></a></p>
						<p class="apercus_auteur right"><a href="#"><span class="icon-users"></span> <?php echo $similar_article['author'];?></a></p>
					</div>
				<?php
				}
				?>
				
			</div>
		</section>

		<section id="content_articles" class="right">
			
			<article class="article">
				<!-- image article -->
				<div class="bloc_image_article">
					<img src="images/uploads/<?php echo $article['image'];?>" alt="<?php echo $article['title'];?>">
				</div>
				<!-- contenu article -->
				<div class="apercus_infos_article">
					<p class="bloc_infos_article right">
						<a href="#"><span class="icon-users"></span> <?php echo $article['pseudo'];?></a> - 
						<span class="icon-calendar"></span> <?php echo toDate($article['created']); ?>
					</p>
					<h1><?php echo $article['title'];?></h1>
					<?php if($article['edit'] != $article['created'])
					{
						echo'
						<p class="small right both">
							<span class="icon-compose"></span>
							'.toDate($article['edit']).'
						</p>';
					}?>
					<?php echo $article['content'];?>
					<br>
					<hr>

					<!-- Ajout commentaires -->
					<?php 
					if(!empty($_SESSION['pseudo']))
					{
						echo '
						<h2>Ajouter un commentaire</h2>
						<form action="index.php?action=article&amp;comment=add&amp;id='.$article['id_article'].'" method="POST">
							<p class="center">
								<textarea name="content" id="addCom" placeholder="Votre commentaire"></textarea>
								<input type="submit" value="Poster">
							</p>
						</form>';
					}
					else
						echo '<p class="center">Vous devez être connecté pour poster un commentaire.</p>';
					?>

					<hr>
					<!-- commentaires -->
					<div id="go_comment">
					<?php 
						$iArticle=1;
						if(!empty($comments))
							foreach($comments as $comment)
							{
						?>
								<div class="commentaire">
									<div id="iArticle<?php echo $iArticle; ?>">
										<p class="infos_commentaire"><?php echo $comment['pseudo'];?> <span class="right"><span class="icon-calendar"></span> <?php echo toDate($comment['created']); ?></span></p>
										<p><?php echo htmlspecialchars($comment['content']);?></p>
									<?php if(!empty($comment['isAuthor']) || (!empty($_SESSION['rank']) && $_SESSION['rank'] == 1))
										echo '
										<span class="edit_commentaire_article">
												<a onclick="showEditComment('.$iArticle.');"><span class="icon-compose"></span> Editer</a> 
												<a href="index.php?action=article&amp;comment=delete&amp;id='.htmlspecialchars($_GET['id']).'&amp;commentId='.$comment['id_comment'].'"><span class="icon-cross2"></span> Supprimer</a>
										</span>';
									?>
									</div>
									<?php
									if(!empty($comment['isAuthor']) || (!empty($_SESSION['rank']) && $_SESSION['rank'] == 1))
										echo '
											<div style="display:none;" id="iArticleEdit'.$iArticle++.'">
												<form method="POST" action="index.php?action=article&amp;comment=edit&amp;id='.htmlspecialchars($_GET['id']).'&amp;commentId='.$comment['id_comment'].'">
													<textarea name="content" class="modifyArticle">'.htmlspecialchars($comment['content']).'</textarea>
													<br><input type="submit" value="Modifier">
												</form>
											</div>
											';
									?>
								</div>
						<?php
							}
						else
							echo '<p class="center">Aucun commentaire</p>';
				
							if(!empty($_SESSION['pseudo']))
								if(!empty($article['isAuthor'])) 
								{
									echo'<hr>
									<!-- boutons commentaire -->
									<p>
										<span class="edit_commentaire_article">
												<a href="index.php?action=editArticle&amp;statment=edit&amp;id_article='.htmlspecialchars($_GET['id']).'"><span class="icon-compose"></span> Editer</a> 
												<a href="index.php?action=editArticle&amp;statment=delete&amp;id_article='.htmlspecialchars($_GET['id']).'"><span class="icon-cross2"></span> Supprimer</a>
										</span>
									<p>';
								}
						?>
					</div>
				</div>
			</article>
		</section>