<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php'); ?>

<section id="inscription">
	<h1>Inscrivez-vous</h1>
	<form action="#" method="POST">
		<p>
			<input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])) echo htmlspecialchars($_POST['pseudo']);?>" placeholder="Votre pseudo" required>
		</p>
		<p>
			<input type="password" name="pass" value="<?php if(isset($_POST['pass'])) echo htmlspecialchars($_POST['pass']);?>" placeholder="Mot de passe" required>
		</p>
		<p>
			<input type="password" name="pass2" value="<?php if(isset($_POST['pass2'])) echo htmlspecialchars($_POST['pass2']);?>" placeholder="Confirmez votre mot de passe" required>
		</p>
		<p>
			<input type="email" name="mail" value="<?php if(isset($_POST['mail'])) echo htmlspecialchars($_POST['mail']);?>" placeholder="Votre adresse email" required>
		</p>
		<p>
			<input type="submit" value="S'inscrire">
		</p>
	</form>
</section>
