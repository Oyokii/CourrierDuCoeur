<?php
$login = $_SESSION['etudiant'];
$messages = $pdo->getEtudiantLetters($login);

foreach($messages as $message){
    echo $message['message'];
}
?>