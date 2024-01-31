<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

require_once("util/class.PDO.PdoCourrier.inc.php");
include("vues/header/v_entete.php");
include("vues/header/v_header.php");
include("util/error.php");
$pdo = Pdocourrier::getPdocourrier();

if (!isset($_REQUEST['uc'])) {
	$uc = 'accueil';
} else {
	$uc = $_REQUEST['uc'];
}

switch($uc)
{
	case 'accueil':
		{
			include ('vues/loader.php');
			include('vues/accueil/accueil.php');
			break;
		}
	case 'login':
		{
			include('controler/c_login.php');
			include ('vues/loader.php');
			include('vues/login/login.php');
			break;
		}
	case 'cvl':
		{
			include ('vues/loader.php');
			include('vues/cvl/cvl.php');
			break;
		}
	case 'accueilMessagerie':
		{
			include ('vues/loader.php');
			include('vues/messagerie/messagerie.php');
			break;
		}
	case 'MesLettres':
		{
			include ('vues/loader.php');
			include('vues/messagerie/mesLettres.php');
			break;
		}
	case 'maLettre':
		{
			include('controler/c_message.php');
			include ('vues/loader.php');
			include('vues/messagerie/maLettre.php');
			break;
		}
	case 'textMessage':
		{
			include('controler/c_message.php');
			include ('vues/loader.php');
			include('vues/messagerie/messagerieText.php');
			break;
		}
	case 'picMessage':
		{
			include('controler/c_message.php');
			include ('vues/loader.php');
			include('vues/messagerie/messageriePhoto.php');
			break;
		}
	case 'popup':
		{
			include('vues/pop-up/popUpReussite.php');
			break;
		}
	case 'pdc':
		{
			include('vues/pdc.php');
			break;
		}
	case 'cgu':
		{
			include('vues/cgu.php');
			break;
		}
	case 'aide':
		{
			include('vues/aide/aide.php');
			break;
		}
}

include("vues/footer/v_footer.php");
?>