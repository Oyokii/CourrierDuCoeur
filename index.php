<?php
session_start();
require_once("util/class.PDO.PdoCourrier.inc.php");
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;

if(!isset($_REQUEST['uc'])){
	$uc = 'connexion';
}
else{
	$uc = $_REQUEST['uc'];

}


switch($uc)
{
    case 'connexion':
        {
            include('controlers/c_verifConnex.php');
            include('vues/v_connexion.php');

            break;
        }
    case 'adminPanel':
        {
            include('controlers/c_verifMessages.php');
            include('vues/v_adminPanel.php');
            break;
        }
}
include("vues/v_footer.php") ;
?>