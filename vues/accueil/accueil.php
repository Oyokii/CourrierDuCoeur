    <section id="titre">
        <h1>COURRIER</h1>
        <p>du Coeur</p>
        <div><a class="decouvrir" href="#milieu_page">Découvrir</a></div>
        
    </section>

    <section id="milieu_page">
        <h2>Des mots doux, des coeurs connectés</h2>
        <div id="gridMilieuPage">
            <div>
                <img src="images/FilleImgimgs_milieu.png" alt="">
                <h3>Choisissez votre destinataire</h3>
                <p>Sélectionnez la personne spéciale à qui vous voulez exprimer votre amour. C'est le premier pas vers un geste romantique inoubliable</p>
            </div>
            <div>
                <img src="images/lettreImgimgs_milieu.png" alt="">
                <h3>Écrivez votre message</h3>
                <p>Laissez votre cœur parler en rédigeant une lettre sincère et personnalisée.</p>
            </div>
            <div>
                <img src="images/NoteImgimgs_milieu.png" alt="">
                <h3>Envoyer votre amour</h3>
                <p>Avec un simple clic, votre message d'amour sera livré de manière spéciale à votre bien-aimé(e). Faites sourire quelqu'un aujourd'hui.</p>
            </div>
        </div>
        <?php
            if(!isset($_SESSION['etudiant'])){
        ?>
            <div style="margin:10vh 0 1vh 0;display: flex;justify-content: center;"><a href="index.php?uc=login">Envoyez une lettre</a></div>
        <?php
            }else{
        ?>
            <div style="margin:10vh 0 1vh 0;display: flex;justify-content: center;"><a href="index.php?uc=accueilMessagerie">Envoyez une lettre</a></div>
        <?php
            }
        ?>

    </section>

    <div class="spacer layer1"></div>

    <section>
        <div id="basDePage">
            <div>
                <p>Le Conseil de la Vie Lycéenne du lgt Baimbridge (CVL), une instance représentative au sein du lycée, permettant aux élèves de participer activement à la vie de l'établissement. 
Il favorise le dialogue entre les élèves et l'administration, contribuant ainsi à l'amélioration du climat scolaire.</p>
                <div style="margin:5vh 0;"><a href="index.php?uc=cvl">Info +</a></div>
            </div>
            <div><img src="images/Logo CVL Round 1.png" alt=""></div>
        </div>
    </section>

