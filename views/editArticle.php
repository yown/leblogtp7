<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');?>

		<section id="edit_article">
			<h1 class="center">Nouvel article</h1>	
			<article class="article">
				<form action="#" method="POST">
					<table id="tab_edit_article">
						<tr>
							<td><label for="titre_input">Titre</label></td>
							<td><input type="text" id="titre_input" name="title"></td>
						</tr>
						<tr>
							<td><label for="image_input">Image de l'article</label></td>
							<td><input type="file" id="image_input" name="image"></td>
						</tr>
						<tr>
							<td colspan="2">
								<textarea name="content" id="content_input"></textarea>
							</td>
						</tr>
					</table>
					<p class="center"><input type="submit" value="Créer"></p>
				</form>
			</article>
		</section>
<?php

callView('footer');

?>