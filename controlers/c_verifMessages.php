<?php
if(!isset($_REQUEST['action'])){
    $action = 'connexion';
}else{
    $action = $_REQUEST['action'];
}

$pdo = Pdocourrier::getPdocourrier();

switch($action){

    case'quarantaine':
        {
            header('Location:index.php?uc=adminPanel');
            $id_user = $_REQUEST['id'];
            $pdo->quarantaine($id_user);
            break;
        }
    case 'ValideMessage':
        {
            header('Location:index.php?uc=adminPanel');
            $id_user = $_REQUEST['id'];
            $pdo->validate($id_user);
            break;
        }
    
        
}

?>