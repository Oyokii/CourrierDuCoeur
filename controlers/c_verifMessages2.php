<?php



$pdo = Pdocourrier::getPdocourrier();

if ($pdo->verifMsgAdmin()) {
    $msg = $pdo->reTakeAMsg();
} else {
    $msg = $pdo->takeAMsg();

}
$eleve = $pdo->getEleveByID($msg[0][1]);

if (isset($_POST['valider'])) {
    $pdo->validate($msg[0][0]);
    echo '<script type="text/javascript">window.location.href = "http://adminpanel2/index.php?uc=adminpanel2";</script>';

}

if (isset($_POST['quarantaine'])) {
    switch ($_POST['motif']) {
        case 'autre':
            $pdo->quarantaine($msg[0][0], $_POST['autre_motif']);
            break;
        case 'langageinapproprie':
            $pdo->quarantaine($msg[0][0], "Langage Inapproprié");
            break;
        case "manquebienveillance":
            $pdo->quarantaine($msg[0][0], "Manque de bienveillance");
            break;
        case "horsujet":
            $pdo->quarantaine($msg[0][0], "Hors Sujet");
            break;
    }
    echo '<script type="text/javascript">window.location.href = "http://adminpanel2/index.php?uc=adminpanel2";</script>';

}







?>