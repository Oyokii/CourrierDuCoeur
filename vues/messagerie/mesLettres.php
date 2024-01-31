
<?php

$id = $_SESSION['etudiant'];
$email = $_SESSION['identifiant'];
$nom = $pdo->getEtudiantID($email);
$messages = $pdo->getEtudiantLetters($id);


if($messages){

?>

<div class="container-mesLettres">
    <div class="Accueil-lettres">
        <h2>Salut, <?php echo $nom[0]['prenom'] ?></h2>
        <p>Prêt à commencer votre journée avec un mot d'amour ?</p>
    </div>

    <div class="mes-lettres">
        <p class="avant-affichage-msg">Méssagerie</p>
        <?php

            foreach($messages as $message){
                $idEtudiant = $message['id_user'];
                $etudiant = $pdo->getEtudiantLettersSender($idEtudiant);
                if($message['anonyme'] === 1){
                    $nomSender = 'anonyme';
                }else{
                    $nomSender = $etudiant[0]['nom']. ' '.$etudiant[0]['prenom'];
                }

        ?>
        <a href="index.php?uc=maLettre&id=<?php echo $message['id'] ?>" class="allMsg">
            <p><?php echo $nomSender ?></p>
            <p id="clickToSee">Cliquez pour découvrir le message.</p>
        </a>
        <?php
            //echo $message['message'];
            }
        ?>
    </div>
</div>

<?php
}else{
?>
<div class="container-mesLettres">
    <div class="Accueil-lettres">
        <h2>Salut, <?php echo $nom[0]['prenom'] ?></h2>
        <p>Prêt à commencer votre journée avec un mot d'amour ?</p>
    </div>
    <h1 class="noLetters">Vous n'avez pas de lettres</h1>
</div>
<?php
}
?>
