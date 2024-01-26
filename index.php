<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

require_once("util/class.PDO.PdoCourrier.inc.php");
include("vues/header/v_entete.php");
include("vues/header/v_header.php");
$pdo = Pdocourrier::getPdocourrier();

if (!isset($_REQUEST['uc'])) {
	$uc = 'accueil';
} else {
	$uc = $_REQUEST['uc'];
}

switch ($uc) {
	case 'accueil': {
			include('vues/loader.php');
			include('vues/accueil/accueil.php');
			include("vues/footer/v_footer.php");
			break;
		}
	case 'login': {
			include('controler/c_login.php');
			include('vues/loader.php');
			include('vues/login/login.php');
			break;
		}
	case 'cvl': {
			include('vues/loader.php');
			include('vues/cvl/cvl.php');
			include("vues/footer/v_footer.php");
			break;
		}
	case 'accueilMessagerie': {
			include('vues/loader.php');
			include('vues/messagerie/messagerie.php');
			break;
		}
	case 'MesLettres': {
			include('vues/loader.php');
			include('vues/messagerie/mesLettres.php');
			break;
		}
	case 'textMessage': {
			include('controler/c_message.php');
			include('vues/loader.php');
			include('vues/messagerie/messagerieText.php');
			break;
		}
	case 'picMessage': {
			include('controler/c_message.php');
			include('vues/loader.php');
			include('vues/messagerie/messageriePhoto.php');
			break;
		}
	case 'aide': {
			include('vues/loader.php');
			include('vues/aide/aide.php');
			include("vues/footer/v_footer.php");

			break;
		}
	case 'cgu': {
			include('vues/loader.php');
			include('vues/cgu.php');
			include("vues/footer/v_footer.php");

			break;
		}
	case 'pdc': {
			include('vues/loader.php');
			include('vues/pdc.php');
			include("vues/footer/v_footer.php");

			break;
		}
}
?>