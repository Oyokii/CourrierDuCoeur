<div class="fixFooter">
    <div class="container-envoieMSG">
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

        <?php
            if(isset($_SESSION['erreur']) && $_SESSION['erreur'] == 2){
                echo '<p style="color:red;">'. ERROR_MESSAGE_SELECT_CLASS .'</p>';
                unset($_SESSION['erreur']);
            }
        ?>
            <select name="classe" id="selector">
                <option value="undefined">choisissez</option>
                <option value="seconde">seconde</option>
                <option value="premiere">premiere</option>
                <option value="terminale">terminale</option>
                <option value="bts">bts</option>
                <option value="prepa">prepa</option>
            </select>

            <?php
                $classes = ['seconde', 'premiere', 'terminale', 'bts', 'prepa'];
                foreach ($classes as $classe) {
                    $eleves = $pdo->getEleve($classe);
            ?>
                <select name="destinataire_<?php echo $classe; ?>" id="<?php echo $classe; ?>" class="classe-select">
                    <?php
                        foreach ($eleves as $eleve) {
                            if($eleve['id_user'] !== $_SESSION['etudiant']){
                    ?>
                            <option value="<?php echo $eleve['id_user']?>"><?php echo $eleve['nom']; ?> <?php echo $eleve['prenom']; ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            <?php
                }
            ?>

            <label for="">Votre message</label>
            <input type="file" name="file" id="file" accept="image/png, image/jpeg" required>
            <div>
                <input name="formMsgTxt" type="submit" value="J'envoie ma lettre">
                <img class="sendMsg" src="../../images/avion-en-papier 1.svg" alt="">
            </div>
                </form>
            </div>
    </div>
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


    var selector = document.getElementById('selector');
    var classeSelects = document.querySelectorAll('.classe-select');

    selector.addEventListener('change', function () {
        classeSelects.forEach(function (select) {
            select.style.display = 'none';
        });

        var selectedValue = selector.value;
        var trouver = document.getElementById(selectedValue);

        if (trouver) {
            trouver.style.display = 'block';
        }
    });
</script>