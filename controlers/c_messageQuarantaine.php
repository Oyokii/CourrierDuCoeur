<?php

$pdo = Pdocourrier::getPdocourrier();

if (isset($_POST['valider'])) {
    $pdo->validate($_POST['message_id']);
    echo '<script type="text/javascript">window.location.href = "http://adminpanel2/index.php?uc=zoneQuarantaine";</script>';

}
?>