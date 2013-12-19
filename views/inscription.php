<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php'); ?>

<section>
	<h1>Inscrivez-vous</h1>
	<form action="#" method="POST">
		<p>
			<input type="text" placeholder="Votre pseudo">
		</p>
		<p>
			<input type="password" placeholder="Mot de passe"><br>
			<input type="password" placeholder="Confirmer votre mot de passe">
		</p>
		<p>
			<input type="submit" value="S'inscrire">
		</p>
	</form>
</section>
<?php

callView('footer');

?>