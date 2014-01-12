<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');?>
		<section id="edit_article">
			<h1 class="center">
				<?php 
				if(htmlspecialchars($_GET['statment']) == "new")
					echo "Nouvel article";
				else
					echo "Editer mon article";
				?>
			</h1>	
			<article class="article">
				<form action="#" method="POST" enctype="multipart/form-data">
					<table id="tab_edit_article">
						<tr>
							<td><label for="titre_input">Titre</label></td>
							<td><input type="text" id="titre_input" name="title" value="<?php echo htmlspecialchars($article['title']);?>"></td>
						</tr>
						<tr>
							<td><label for="image_input">Image de l'article</label></td>
							<?php 
							if(!empty($article['image']))
							{
								echo '<td>
										<img src="images/uploads/'.$article['image'].'" alt="image" width="200">
										<input type="file" id="image_input" name="image" />
										<input type="hidden" name="image_exist">
									</td>';
							}
							else
							{
								echo '<td><input type="file" id="image_input" name="image" /></td>';
							}
							?>
						</tr>
						<tr>
							<td><label for="id_cat_input">Catégorie de l'article</label></td>
							<td>
								<select name="id_cat" id="id_cat_input">
									<?php 
									foreach ($categories as $list_cat) 
									{
										if($list_cat['id_cat'] == $article['id_cat'])
									 		echo '<option value="'.$list_cat['id_cat'].'" selected>'.$list_cat['name'].'</option>';
									 	else
									 		echo '<option value="'.$list_cat['id_cat'].'">'.$list_cat['name'].'</option>';

									}
									?>
						       </select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<textarea name="content" class="tinyMCE" id="content_input">
									<?php echo $article['content'];?>
								</textarea>
							</td>
						</tr>
					</table>
					<?php if(isset($article))
						echo '<input type="hidden" name="id_article" value="'.$article['id_article'].'">';

					if(htmlspecialchars($_GET['statment']) == "new")
						echo '<p class="center"><input type="submit" value="Créer"></p>';
					else
						echo '<p class="center"><input type="submit" value="Modifier"></p>';
					?>
				</form>
			</article>
		</section>