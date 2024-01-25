<header class="bg-1-accent">
    <ul class="navbar">
        <?php
        if (isset($_SESSION['etudiant'])) {
            ?>
            <li>
                <a href="index.php?uc=login&action=deconnexion" id="seConnecter" style="padding: 0.4em 1em">
                    Se déconnecter
                </a>
            </li>

        <?php } else { ?>
            <li>
                <a href="index.php?uc=login" id="seConnecter" style="padding: 0.4em 1em">
                    Se Connecter
                </a>
            </li>
        <?php } ?>
        <li><a href="index.php?uc=aide" class="lien">Aide</a></li>
        <li><a href="index.php?uc=cvl" class="lien">CVL</a></li>
        <?php
        if (isset($_SESSION['etudiant'])) {
            ?>
            <li><a href="index.php?uc=accueilMessagerie" class="lien">Messagerie</a></li>
            <li><a href="index.php?uc=MesLettres" class="lien">Mes lettres</a></li>


        <?php } ?>
        <li><a href="index.php?uc=accueil" class="lien">Accueil</a></li>
    </ul>


    </div>

    <button id="navBarBtn" class="hamburger hamburger--spin" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>

    <div id="dropdownNavBar">
        <a href="index.php?uc=accueil">Accueil</a>
        <a href="index.php?uc=accueilMessagerie">Messagerie</a>
        <a href="index.php?uc=cvl">CVL</a>
        <a href="index.php?uc=aide">Aide</a>
        <a href="index.php?uc=login">Se Connecter</a>
    </div>

    <ul class="navBarFermer">

    </ul>
    <script>
        var forEach = function (t, o, r) { if ("[object Object]" === Object.prototype.toString.call(t)) for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t); else for (var e = 0, l = t.length; l > e; e++)o.call(r, t[e], e, t) };

        var hamburgers = document.querySelectorAll(".hamburger");
        if (hamburgers.length > 0) {
            forEach(hamburgers, function (hamburger) {
                hamburger.addEventListener("click", function () {
                    this.classList.toggle("is-active");

                }, false);
            });
        }

        var navBarBtn = document.getElementById('navBarBtn');
        var dropdownNavBar = document.getElementById('dropdownNavBar');

        dropdownNavBar.classList.add("animCacher");


        navBarBtn.addEventListener('click', function () {
            if (dropdownNavBar.style.display == "flex") {
                dropdownNavBar.classList.add("animCacher");
                setTimeout(() => {
                    dropdownNavBar.style.display = "none";

                }, 500);
                dropdownNavBar.classList.remove("animMontrer");
            } else {
                dropdownNavBar.style.display = "flex";

                setTimeout(() => {

                    dropdownNavBar.classList.remove("animCacher");
                    dropdownNavBar.classList.add("animMontrer");

                }, 100);
            }
        })
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 768) {
                dropdownNavBar.style.display = "none";

                forEach(hamburgers, function (hamburger) {
                    hamburger.classList.remove("is-active");
                });

            }
        })

        window.addEventListener('scroll', function () {
            if (dropdownNavBar.style.display == "flex") {
                dropdownNavBar.classList.add("animCacher");
                forEach(hamburgers, function (hamburger) {
                    hamburger.classList.remove("is-active");
                });
                setTimeout(() => {
                    dropdownNavBar.style.display = "none";
                }, 500);
                dropdownNavBar.classList.remove("animMontrer");
            }
        })
    </script>
</header>
<body>