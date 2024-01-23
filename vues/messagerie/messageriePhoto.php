
<div>
<form  method="post" class="containerMessage" action="index.php?uc=picMessage&action=sendPicMessage" enctype="multipart/form-data">
    <h1>Envoi de la carte</h1>
    <label >De la part de :</label>
    <div class="btnsanonyme">
        <input type="radio" name="anonyme-non" class="anonyme" id="anonyme-non" checked></input>
        <label for="anonyme-non">Afficher mon nom</label>
        <img class="oeil" src="../../images/oeil (1) 1.svg" alt="">
        <input type="radio" name="anonyme-oui" class="anonyme" id="anonyme-oui" ></input>
        <label for="anonyme-oui">Rester anonyme</label>
        <img class="oeil" src="../../images/oeil (2) 1.svg" alt="">
    </div>

    <label for="destinataire">Envoyer à :</label>
    <select name="destinataire" id="destinataire" required>
    <option disabled selected value> -- Choisir un destinataire -- </option>
        <?php 
        $eleves = $pdo->getAllEleve();
        foreach($eleves as $eleve){

        if($eleve['id_user'] !== $_SESSION['etudiant']){
            ?>
            <option value="<?php echo $eleve['id_user']?>"><?php echo $eleve['nom']?> <?php echo $eleve['prenom']?></option>
            <?php
            }
        }
        ?>
    </select>

    <label for="">Votre message</label>
    <input type="file" name="file" id="file" required>
    <div>
        <input name="formMsgTxt" type="submit" value="J'envoie ma lettre">
        <img class="sendMsg" src="../../images/avion-en-papier 1.svg" alt="">
    </div>
        </form>
    </div>
    
    <script src="" async defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // bouton radio
        var radioButtons = document.querySelectorAll('.anonyme');

        // si un bouton est selectionner
        radioButtons.forEach(function (radioButton) {
            radioButton.addEventListener('change', function () {
                // deselection jai sommeil mais jai pas envie de dormir mamène
                radioButtons.forEach(function (otherRadioButton) {
                    if (otherRadioButton !== radioButton) {
                        otherRadioButton.checked = false;
                    }
                });
            });
        });
    });
</script>