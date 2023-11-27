<?php
if(!isset($_REQUEST['action'])){
    $action = 'connexion';
}else{
    $action = $_REQUEST['action'];
}

$pdo = Pdocourrier::getPdocourrier();

switch($action){

    case 'verifAdmin':
        {
            $erreur = '';
            $login = isset($_POST['identifiant']) ? $_POST['identifiant']: '';
            $mdp = isset($_POST['mdp']) ? $_POST['mdp']: '';

            $mdpBDD = $pdo->getVerifAdmin($login);

            if(password_verify($mdp,$mdpBDD)){
                //echo'super';
                $_SESSION['admin'] = $login;
                header('Location: index.php?uc=adminPanel');
            }else{
                //echo'mauvais mdp';
                header('Location: index.php?uc=connexion');
            }
            //creer un mdp crypter pour le test

            /*$salage = '$5$qued#love';
            $msgcrypter = crypt($mdp,$salage);
            echo $msgcrypter;*/
            break;
        }
}

?>