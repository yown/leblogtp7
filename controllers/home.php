<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

 // Libs ans Models Automaticly loaded at APPPATH/libs and APPPATH/models if names are the identicals 

 
 // je n'ai pas mis d'exemple de lib pour pas foutre toute la comprhéension en l'air :) 
 // mais si tu sais pas si ça doit aller dans le modele ou controlleur : ça peut aller dans la lib 
 addValidation('You successfully did your first fake template ! congrat !', $infosHeader);
 // addInformation('Les truc de notif sont good', $infosHeader);
 // addError('on peut même dire qu\'il est pas content', $infosHeader);
 
 $dataHome = array(
	'recent_articles' => 'à faire',
	'articles' => array(
		0 => array(
			'image'    => 'http://lorempixel.com/650/300/',
			'author'   => 'loremPixel',
			'date'     => 'il y a 10 heures',
			'title'    => 'Un générateur d\'image :)',
			'content'  => 'Nous voyons à ce jour apparaitre un MotherFucking générateur super extra cool : j\'ai nommé LoremPixel. Il génère Automatiquement et aléatoirement des images de la taille de votre choix. Très pratique pour par exemple illustrer un blog en construction comme l\'incroyable BlackWave qui [...]',
			'comments' => array(
				0 => array(
					'author'  => 'Amazing',
					'date'    => 'il y a 2 secondes',
					'content' => 'That fucking awsome Man, i want this so hard !'
				),
				1 => array(
					'author'  => 'notbadguy',
					'date'    => 'il y a 12 minutes',
					'content' => 'ça c\'est plutot sympa ;)'
				)
			)
		),
		1 => array(
			'image'    => 'http://placekitten.com/650/200',
			'author'   => 'KittyFanBoy',
			'date'     => 'il y a 3 heures',
			'title'    => 'Un chaton très con',
			'content'  => 'Le chat domestique (Felis silvestris catus) est un mammifère carnivore de la famille des félidés. Il est l’un des principaux animaux de compagnie et compte aujourd’hui une cinquantaine de races différentes reconnues par les instances de certification. Dans de nombreux pays, le chat entre dans le cadre de la législation sur les carnivores domestiques à l’instar du chien et [...]',
			'comments' => array(
				0 => array(
					'author'  => 'An@rchiste',
					'date'    => 'il y a 2 secondes',
					'content' => 'brûlons ces maudites créatures !'
				),
				1 => array(
					'author'  => 'Egyptocrate',
					'date'    => 'il y a 1 minute',
					'content' => 'Que dieu protège ce malheureux'
				)
			)
		)
	)
 );
 
 // okay appelons la vue
 callView('header', $infosHeader);
 callView('home'  , $dataHome); // sera sous la forme $non ou $helloMotherFuckingWorld, elle sont reinterpretées

?>