<div class="popUp-container" style="--clr:#FF004A;">

<?php
  $erreur = isset($_SESSION['erreur']) && !empty($_SESSION['erreur']) ? $_SESSION['erreur'] : null;
  $identifiant = $_SESSION['identifiant'];
  $msgLeft = $pdo->getNbMsgLeftEtudiant($identifiant);

  if($msgLeft == 0){
?>
<div id="succPopUp" class="popUp" style="--clr:#FDB703;">
    <img src="../../images/Goodies-Heart.png">
    <h2>C'est fini !</h2>
    <p><?php echo ERROR_MESSAGE_TOO_MANY_MESSAGES ?></p>
    <p class="msgLeft">Message restant : <?php echo $msgLeft ?></p>
    <button><a href="index.php?uc=accueilMessagerie">Accueil</a></button>
</div>

<?php
  }elseif ($msgLeft !== 0 && $erreur == 0) {
    ?>
<div id="succPopUp" class="popUp" style="--clr:#FDB703;">
    <img src="../../images/Goodies-Heart.png">
    <h2>Succès !</h2>
    <p>Tout s'est bien passé, félicitations!</p>
    <p class="msgLeft">Message restant : <?php echo $msgLeft ?></p>
    <button><a href="index.php?uc=accueilMessagerie">Suivant</a></button>
</div>

<?php
  }else{
?>


<?php
  }
?>




<?php


switch($erreur){
  case '5':
  {
    ?>
    <div id="errPopUp" class=popUp>
        <img src="../../images/Goodies-Error.png">
        <h2>Oh non...</h2>
        <p><?php echo ERROR_MESSAGE_FILE_SIZE_EXCEEDED ?></p>
        <button><a href="index.php?uc=accueilMessagerie">Réessayer</a></button>
    </div>
    <?php
    break;
  }
  case '6':
    {
      ?>
      <div id="errPopUp" class=popUp>
          <img src="../../images/Goodies-Error.png">
          <h2>Oh non...</h2>
          <p><?php echo ERROR_MESSAGE_INVALID_FILE_EXTENSION ?></p>
          <button><a href="index.php?uc=accueilMessagerie">Réessayer</a></button>
      </div>
      <?php
      break;

    }
}


?>
</div>




<style>
    .popUp-container{
        display: flex;
        justify-content: center;
        height: 100dvh;
        align-items: center;
      }
      
      .popUp-container h2{
        color: #666259;
        text-align: center;
        font-family: Mona-Sans;
        font-size: 25px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
      }
      .popUp-container p{
        color: #9A9280;
        text-align: center;
        font-family: Mona-Sans;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        width: 215px;
      }

      .popUp-container img{
        width: 260px;
      }
      .popUp-container a{
        text-decoration: none;

      }
      .popUp-container button{
        width: 250px;
        height: 60px;
        flex-shrink: 0;
        border-radius: 60px;
        background: var(--clr);
        color: #FFF;
        font-family: Mona-Sans;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        transition: 0.2s;
        border: none;
      }
      .popUp-container button:hover{
        border: 1px solid var(--clr);
        background: transparent;
        color:var(--clr) ;
        box-shadow: 5px 5px 15px -4px rgba(0, 0, 0, 0.33);
      }
      
      .popUp{
        background: #feffff;
        width: 341px;
        height: 562px;
        border-radius: 37px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 28px;
      }
      .popUp-container .msgLeft{
        font-size: 17px;
      }
      

      
</style>