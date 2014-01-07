<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');?>
		<section id="edit_article">
			<h1 class="center">Nouvel article</h1>	
			<article class="article">
				<form action="#" method="POST">
					<table id="tab_edit_article">
						<tr>
							<td><label for="titre_input">Titre</label></td>
							<td><input type="text" id="titre_input" name="title" value="<?php echo htmlspecialchars($article['title']);?>"></td>
						</tr>
						<tr>
							<td><label for="image_input">Image de l'article</label></td>
							<td><input type="file" id="image_input" name="image" ></td>
						</tr>
						<tr>
							<td><label for="id_cat_input">Catégorie de l'article</label></td>
							<td>
								<select name="id_cat" id="id_cat_input">
									<?php 
									foreach ($categories as $list_cat) 
									{
									?>
										<option value="<?php echo $list_cat['id_cat'];?>"><?php echo $list_cat['name'];?></option>
									<?php
									}
									?>
						       </select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<textarea name="content" id="content_input">
									<?php echo $article['content'];?>
								</textarea>
							</td>
						</tr>
					</table>
					<input type="hidden" name="id_article" value="<?php echo $article['id_article'];?>">
					<p class="center"><input type="submit" value="Créer"></p>
				</form>
			</article>
		</section>
<?php

callView('footer');

?>