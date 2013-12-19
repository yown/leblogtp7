<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php'); ?>

<section id="inscription">
	<h1>Inscrivez-vous</h1>
	<form action="#" method="POST">
		<p>
			<input type="text" name="pseudo" placeholder="Votre pseudo">
		</p>
		<p>
			<input type="password" name="pass" placeholder="Mot de passe">
		</p>
		<p>
			<input type="password" name="pass2" placeholder="Confirmez votre mot de passe">
		</p>
		<p>
			<input type="submit" value="S'inscrire">
		</p>
	</form>
</section>
<?php

callView('footer');

?>