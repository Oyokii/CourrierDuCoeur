<header>
    <nav>
        <ul>
            <?php
                if(isset($_SESSION['admin'])){
            ?>
            <li><a href="index.php?uc=adminPanel">ATTENTE</a></li>
            <li><a href="index.php?uc=valide">VALIDE</a></li>
            <li><a href="index.php?uc=zoneQuarantaine">QUARANTAINE</a></li>
            <li><a href="index.php?uc=select">select</a></li>
            <li><a href="index.php?uc=connexion&action=deconnexion">deconexion</a></li>
            <li><a href="index.php?uc=adminpanel2">attente2</a></li>

            <?php
                }
            ?>
        </ul>
    </nav>
</header>