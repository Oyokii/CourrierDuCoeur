<?php


$pdo = Pdocourrier::getPdocourrier();

if (isset($_POST['refuser'])) {
    switch ($_POST['motif']) {
        case 'autre':
            $pdo->quarantaine($_POST['message_id'], $_POST['autre_motif']);
            break;
        case 'langageinapproprie':
            $pdo->quarantaine($_POST['message_id'], "Langage Inapproprié");

            break;
        case "manquebienveillance":
            $pdo->quarantaine($_POST["message_id"], "Manque de bienveillance");
            break;
        case "horsujet":
            $pdo->quarantaine($_POST["message_id"], "Hors Sujet");
            break;
    }

    echo '<script type="text/javascript">window.location.href = "http://adminpanel2/index.php?uc=valide";</script>';

}
?>