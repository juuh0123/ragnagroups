<?php
require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));
switch($tela):
	case 'home':
		echo 'Eu sou o modulo de database.';
	break;
endswitch;			