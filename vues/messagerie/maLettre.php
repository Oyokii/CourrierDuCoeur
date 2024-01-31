<?php
$idM = $_REQUEST['id'];
$id = $_SESSION['etudiant'];
$messages = $pdo->getOneLetter($id,$idM);


?>

<div class="container-mon-message">
    <?php
        if($messages){

            if($messages[0]['anonyme'] === 1){
                $nomSender = 'anonyme';
            }else{
                $nomSender = $messages[0]['nom'] . ' ' . $messages[0]['prenom'];
            }
    ?>
    <div class="top">
        <p>Méssage de :</p>
    </div>
    <div class="leMessage">
        <h2><?php echo $nomSender ?></h2>

        <?php
            if (strpos($messages[0]['message'], 'http://') !== false) {
                ?>
                <a href="<?php echo $messages[0]['message']; ?>" download="<?php echo $messages[0]['message']; ?>"><img src="<?php echo $messages[0]['message'] ?>" width="300px" height="300px"></a>

                <?php
            } else {
                ?>
                    <p><?php echo $messages[0]['message'] ?></p>
                <?php
            }
        ?>
    </div>
    <?php
        }else{
    ?>
        <h1 class="noLetters">Vous n'avez pas de lettres</h1>
    <?php
        }
    ?>

</div>