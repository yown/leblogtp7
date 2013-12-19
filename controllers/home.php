<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

 // Libs ans Models Automaticly loaded at APPPATH/libs and APPPATH/models if names are the identicals 
 
 $unAutreTableau = array(
	'helloMotherFuckingWorld' => getHelloWorld() // function du modele chargé automatiquement
 );

 
 // je n'ai pas mis d'exemple de lib pour pas foutre toute la comprhéension en l'air :) 
 // mais si tu sais pas si ça doit aller dans le modele ou controlleur : ça peut aller dans la lib 
 addValidation('okay c\'est bon', $infosHeader);
 addInformation('Les truc de notif sont good', $infosHeader);
 addError('on peut même dire qu\'il est pas content', $infosHeader);
 // addError('okay c\'est bon', $infosHeader);
 // addInformation('okay c\'est bon', $infosHeader);
 
 // okay appelons la vue
 callView('header', $infosHeader);
 callView('home'  , $unAutreTableau); // sera sous la forme $non ou $helloMotherFuckingWorld, elle sont reinterpretées

?>