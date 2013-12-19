<?php if(!defined('APPPATH')) exit('You shouldn\'t have seen this, htaccess removed OR APPATH removed in /index.php');

 // okay appelons la vue
 callView('header', $infosHeader);
 callView('inscription'); // sera sous la forme $non ou $helloMotherFuckingWorld, elle sont reinterpretées

?>