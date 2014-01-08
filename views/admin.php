<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php'); ?>

<section id="inscription">
	<h1>Zone d'administration</h1>
	<hr>
	<h2>Modifier les droits des membres</h2>
	<form action="#" method="POST" id="form_type_user">
		<table>
			<tr>
				<td><label for="id_user_input">Pseudo</label></td>
				<td><label for="id_rank_input">Type</label></td>
				<td></td>
			</tr>
			<tr>
				<td>
					<select name="id_user" id="id_user_input">
						<?php 
						foreach ($users as $user) 
						{
							echo '<option value="'.$user['id_user'].'">'.$user['pseudo'].'</option>';
						}
						?>
					</select>
				</td>
				<td>
					<select name="id_rank" id="id_rank_input">
						<?php 
						foreach ($ranks as $rank) 
						{
							echo '<option value="'.$rank['id_rank'].'">'.$rank['name'].'</option>';
						}
						?>
					</select>
				</td>
				<td><input type="submit" value="Modifier"></td>
			</tr>
		</table>
		
	</form>
</section>
