<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php'); ?>

<section id="inscription">
	<h1>Zone d'administration</h1>
	<hr>
	<h2>Modifier les droits des membres</h2>
	<form action="#" method="POST" id="form_type_user">
		<table>
			<tr>
				<td>
					<select name="id_user" id="id_user_input">
						<option value="0">Pseudo</option>
						<?php 
						foreach ($users as $user) 
						{
							if(isset($_POST) && ($_POST['id_user'] == $user['id_user']))
								echo '<option value="'.$user['id_user'].'" selected>'.$user['pseudo'].'</option>';
							else
								echo '<option value="'.$user['id_user'].'">'.$user['pseudo'].'</option>';
						}
						?>
					</select>
				</td>
				<td>
					<select name="id_rank" id="id_rank_input">
						<option value="0">Type</option>
						<?php 
						foreach ($ranks as $rank) 
						{
							if(isset($_POST) && ($_POST['id_rank'] == $rank['id_rank']))
								echo '<option value="'.$rank['id_rank'].'" selected>'.$rank['name'].'</option>';
							else
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
