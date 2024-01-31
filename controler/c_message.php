<?php
if(!isset($_REQUEST['action'])){
    $action = 'accueil';
}else{
    $action = $_REQUEST['action'];
}

$pdo = Pdocourrier::getPdocourrier();

switch($action){

    case 'sendTextMessage':
        {
            $_SESSION['erreur'] = 0;

            $identifiant = $_SESSION['identifiant'];
            $id_user = $_SESSION['etudiant'];

            $nb_msg_left = $pdo->getNbMsgLeftEtudiant($identifiant);
            if($nb_msg_left > 0){
                if(isset($_POST['formMsgTxt'])){
                    if($_POST['classe'] && $_POST['classe'] !== 'undefined'){
                        $selected_class = $_POST['classe'];
                        $id_receiver = $_POST['destinataire_' . $selected_class];

                        //$id_receiver = $_POST['destinataire'];
                        $message = $_POST['msg_content'];
        
                        $anonymeOui = isset($_POST['anonyme-oui']) ? $_POST['anonyme-oui']: '';

                        if($anonymeOui){
                            $anonyme = 1;
                        }else{
                            $anonyme = 0;
                        }
                        //var_dump($anonyme, $id_user, $id_receiver, $message);
                        if($message!='' && $id_receiver != "Null"){
                            if (strlen($message) > 10){
                                $pdo->send_msg($id_user,$id_receiver,$message,$anonyme);

                                $pdo->decreaseNbMsg($identifiant);

                                header('Location: index.php?uc=popup');
                            } else{
                                $_SESSION['erreur'] = 1;
                                //header('Location: index.php?uc=popup');
                            }
                        }
                    }else{
                        $_SESSION['erreur'] = 2;
                    }
                }
            }else{
                $_SESSION['erreur'] = 3;
                header('Location: index.php?uc=popup');
            }
            break;
        }
        case 'sendPicMessage':
            {
                $_SESSION['erreur'] = 0;

                require_once('src/class.upload.php');
                
                // Vérifie si le fichier a été correctement téléchargé
                $file = isset($_FILES['file']) && !empty($_FILES['file']) ? $_FILES['file'] : null;
                $foo = new \Verot\Upload\Upload($file);
        
                $login = $_SESSION['identifiant'];
                $etudiant = $pdo->getEtudiantID($login);
                $id_user = $_SESSION['etudiant'];
                $nb_msg_left = $pdo->getNbMsgLeftEtudiant($login);
                $selected_class = isset($_POST['classe']) && !empty($_POST['classe']) ? $_POST['classe'] : null;
                $id_receiver = isset($_POST['destinataire_' . $selected_class]) && !empty($_POST['destinataire_' . $selected_class]) ? $_POST['destinataire_' . $selected_class] : null;
        
                // Liste blanche d'extensions autorisées
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        
                // Poids maximal autorisé en octets
                $max_file_size = 5 * 1024 * 1024;
                if ($nb_msg_left > 0) {
                    if($selected_class !== 'undefined'){
                        if ($foo->uploaded) {
                            // Vérifie l'extension du fichier
                            $file_extension = strtolower(pathinfo($foo->file_src_name, PATHINFO_EXTENSION));
            
                            if (in_array($file_extension, $allowed_extensions)) {
                                // Vérifie le poids du fichier
                                if ($foo->file_src_size <= $max_file_size) {
                                    $foo->file_new_name_body = $etudiant[0][2] . ' ' . $etudiant[0][3];
                                    $foo->process('C:\wamp64\www\courrierducoeur\imgUsers');
            
                                    if ($foo->processed) {
                                        echo 'original image copied';
                                        $anonymeOui = isset($_POST['anonyme-oui']) ? $_POST['anonyme-oui'] : '';
                                        $anonyme = ($anonymeOui) ? 1 : 0;

                                        
                                        $base_path = 'http://localhost/'; // Chemin de base pour WampServer
                                        $image_path = $base_path . str_replace('\\', '/', 'courrierducoeur\imgUsers');
                                        $message = $image_path . '\\' . $foo->file_dst_name;
                                        $pdo->send_msg($id_user, $id_receiver, $message, $anonyme);
                                        $pdo->decreaseNbMsg($login);
                            
                                        header('Location: index.php?uc=popup');
                                        exit; // Arrête l'exécution après la redirection
                                    } else {
                                        echo 'error : ' . $foo->error;

                                    }
                                } else {
                                    // Poids du fichier trop élevé
                                    $_SESSION['erreur'] = 7;

                                    //echo 'Poids du fichier trop élevé. Veuillez sélectionner un fichier plus léger.';
                                    exit; // Arrête l'exécution en cas de poids de fichier trop élevé
                                }
                            } else {
                                // Extension de fichier non autorisée
                                header('Location: index.php?uc=popup');
                                $_SESSION['erreur'] = 6;

                                //echo "Extension de fichier non autorisée.";
                                exit; // Arrête l'exécution en cas d'extension non autorisée
                            }
                        } else {
                            // Erreur lors du téléchargement du fichier
                            header('Location: index.php?uc=popup');
                            $_SESSION['erreur'] = 5;

                            //echo "Erreur lors du téléchargement du fichier.";
                            exit; // Arrête l'exécution en cas d'erreur de téléchargement
                        }
                    }else{
                        $_SESSION['erreur'] = 2;
                    }
                } else {
                    //$_SESSION['erreur'] = 3;
                    header('Location: index.php?uc=popup');
                    exit; // Arrête l'exécution après la redirection
                }
                break;
            }
}
?>