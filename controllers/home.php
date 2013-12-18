<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

 // Libs ans Models Automaticly loaded at APPPATH/libs and APPPATH/models if names are the identicals 
 
 $unTableau = array(
	'nom' => 'Maitre du monde et de l\'espace : Kevin, ouai les accents passent pas encore ... :)'
 );
 
 $unAutreTableau = array(
	'helloMotherFuckingWorld' => getHelloWorld() // function du modele chargé automatiquement
 );

 
 // je n'ai pas mis d'exemple de lib pour pas foutre toute la comprhéension en l'air :) 
 // mais si tu sais pas si ça doit aller dans le modele ou controlleur : ça peut aller dans la lib 
 
 // okay appelons la vue
 callView('header', $unTableau); // je charge la page header aec tel variable
 callView('home'  , $unAutreTableau); // sera sous la forme $non ou $helloMotherFuckingWorld, elle sont reinterpretées

?>