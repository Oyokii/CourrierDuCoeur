<?php

if(!isset($_REQUEST['action'])){
    $action = 'login';
}else{
    $action = $_REQUEST['action'];
}

$pdo = Pdocourrier::getPdocourrier();

switch($action){

    case 'loginUser':
        {
            $_SESSION['erreur'] = '';

            if(isset($_POST['login'])){
                $identifiant = $_POST['identifiant'];
                $mdp = $_POST['mdp'];
            
                $mdpBDD = $pdo->getVerifEtudiant($identifiant);
                $id = $pdo->getEtudiantID($identifiant);
            
                if(password_verify($mdp,$mdpBDD)){
                    //echo'super';
                    $_SESSION['etudiant'] = $id[0][0];
                    $_SESSION['identifiant'] = $id[0][1];

                    header('Location: index.php?uc=accueil');
                }else{
                    $_SESSION['erreur'] = 'Mauvais identifiant ou mot de passe';
                    header('Location: index.php?uc=login');
                    exit;
                }
            }

            /*$salage = '$5$qued#love';
            $msgcrypter = crypt($mdp,$salage);
            echo $msgcrypter;*/
            break;
        }
    case 'deconnexion':
        {
            session_destroy();
            header('Location: index.php?uc=accueil');
            break;
        }
}
?>