<?php
if(!isset($_REQUEST['action'])){
    $action = 'login';
}else{
    $action = $_REQUEST['action'];
}

$pdo = Pdocourrier::getPdocourrier();

switch($action){

    case 'sendTextMessage':
        {
            $identifiant = $_SESSION['identifiant'];
            $id_user = $_SESSION['etudiant'];

            $nb_msg_left = $pdo->getNbMsgLeftEtudiant($identifiant);
            if($nb_msg_left > 0){

                if(isset($_POST['formMsgTxt'])){
                    $id_receiver = $_POST['destinataire'];
                    $message = $_POST['msg_content'];
    
                    $anonymeOui = isset($_POST['anonyme-oui']) ? $_POST['anonyme-oui']: '';
                    if($anonymeOui){
                        $anonyme = 1;
                    }else{
                        $anonyme = 0;
                    }
                    //var_dump($anonyme, $id_user, $id_receiver, $message);

                    if($message!='' && $id_receiver != "Null"){
                        $pdo -> send_msg($id_user,$id_receiver,$message,$anonyme);
                    }
                }
                $pdo->decreaseNbMsg($identifiant);

                header('Location: index.php?uc=accueil');

            }else{
                echo 'trop de messages envoyer'.$nb_msg_left;
            }


            break;
        }
    case 'sendPicMessage':
        {


            require_once('src/class.upload.php');
            $foo = new \Verot\Upload\Upload($_FILES['file']);
            /*echo '<pre>';

            print_r($_FILES['file']);

            echo '</pre>';*/
            $login = $_SESSION['identifiant'];
            $etudiant = $pdo->getEtudiantID($login);
            $id_user = $_SESSION['etudiant'];
            $nb_msg_left = $pdo->getNbMsgLeftEtudiant($login);
            $id_receiver = $_POST['destinataire'];

            if($nb_msg_left > 0){
                if ($foo->uploaded) {


                    // save uploaded image with no changes
                    $foo->file_new_name_body = $etudiant[0][2] . ' ' . $etudiant[0][3];
                    $foo->process('C:\wamp64\www\CourierDuCoeur\imgUsers');
    
                    if ($foo->processed) {
                        echo 'original image copied';
                      } else {
                        echo 'error : ' . $foo->error;
                      }
                }
                $anonymeOui = isset($_POST['anonyme-oui']) ? $_POST['anonyme-oui']: '';
                if($anonymeOui){
                    $anonyme = 1;
                }else{
                    $anonyme = 0;
                }
                //var_dump($anonyme, $id_user, $id_receiver, $message);

                $message = 'C:\wamp64\www\CourierDuCoeur\imgUsers\\' . $foo->file_dst_name;
                $pdo -> send_msg($id_user,$id_receiver,$message,$anonyme);

                $pdo->decreaseNbMsg($login);
    
                header('Location: index.php?uc=accueil');
            }else{
                header('Location: index.php?uc=picMessage');
            }


            break;
        }
}
?>