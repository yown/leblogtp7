<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php'); ?>

<section id="inscription">
	<h1>Zone d'administration</h1>
	<hr>
	<h2>Modifier les droits des membres</h2>
	<form action="#" method="POST" id="form_type_user">
		<table>
			<tr>
				<td><label for="id_cat_input">Pseudo</label></td>
				<td><label for="id_cat_input">Type</label></td>
				<td></td>
			</tr>
			<tr>
				<td>
					<select name="id_user" id="id_user_input">
						<option value="1" selected>Pseudo</option>
					</select>
				</td>
				<td>
					<select name="id_type" id="id_type_input">
						<option value="1" selected>Administrateur</option>
						<option value="2" selected>Blogger</option>
						<option value="3" selected>Membre</option>
					</select>
				</td>
				<td><input type="submit" value="Modifier"></td>
			</tr>
		</table>
		
	</form>
</section>
