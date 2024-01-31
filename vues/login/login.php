<div class="fixFooter">
    <div class="container">
        <form method="post" class="left" action="index.php?uc=login&action=loginUser">
            <h1>Se connecter</h1>
            <?php 
                if(isset($_SESSION['erreur'])){
                    echo '<p style="color:red;">' . $_SESSION['erreur'] . '</p>';
                    unset($_SESSION['erreur']); // Supprimez la variable de session après l'avoir affichée
                }
            ?>
            <label>E-mail</label>
            <input type="text" name='identifiant' id="id">
            <img src="../../images/profil 1.svg">
            <label>Mot de passe</label>
            <input type="text" name='mdp' id="mdp">
            <img src="../../images/verrouiller.svg">
            <input name="login" type="submit" value="Continuer">
        </form>
        <div class="right">
            <img src="../../images/Inlove-pana.svg">
        </div>
    </div>
</div>
<script src="" async defer></script>