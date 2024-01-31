<?php
if (!isset($_REQUEST['action'])) {
    $action = 'connexion';
} else {
    $action = $_REQUEST['action'];
}

$pdo = Pdocourrier::getPdocourrier();

switch ($action) {

    case 'verifAdmin': {
            $erreur = '';
            $login = isset($_POST['identifiant']) ? $_POST['identifiant'] : '';
            $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '';

            $mdpBDD = $pdo->getVerifAdmin($login);
            if (password_verify($mdp, $mdpBDD)) {
                //echo'super';
                $_SESSION['admin'] = $login;
                $_SESSION['adminID'] = $pdo->getAdminID($login);
                ;
                echo '<script type="text/javascript">window.location.href = "http://adminpanel2/index.php?uc=adminpanel2";</script>';

            } else {
                //echo'mauvais mdp';
                echo '<script type="text/javascript">window.location.href = "http://adminpanel2/index.php?uc=connexion";</script>';

            }
            //creer un mdp crypter pour le test

            /*$salage = '$5$qued#love';
            $msgcrypter = crypt($mdp,$salage);
            echo $msgcrypter;*/
            break;
        }
    case 'deconnexion': {
            session_destroy();
            echo '<script type="text/javascript">window.location.href = "http://adminpanel2/index.php?uc=connexion";</script>';

            break;
        }
}

?>