<link rel="stylesheet" href="../style/style.scss">
<header>
    <?php
    if (isset($_SESSION['admin'])) {
        ?>
        <nav class="navbar">
            <ul>
                <li><a href="index.php?uc=adminpanel2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            viewBox="0 0 60 60" fill="none">
                            <path class="svg"
                                d="M55 30.5098V34.3125C55 44.0645 55 48.9407 52.071 51.9702C49.1422 55 44.428 55 35 55H25C15.5719 55 10.8579 55 7.92893 51.9702C5 48.9407 5 44.0645 5 34.3125V30.5098C5 24.7887 5 21.9282 6.298 19.5569C7.596 17.1855 9.96737 15.7138 14.7101 12.7703L19.7101 9.66717C24.7235 6.55572 27.2302 5 30 5C32.7698 5 35.2765 6.55572 40.29 9.66717L45.29 12.7703C50.0327 15.7138 52.404 17.1855 53.702 19.5569"
                                style="stroke-width:3.75; stroke-linecap:round;" />
                            <path class="svg" d="M37.5 45H22.5" style="stroke-width:3.75; stroke-linecap:round;" />
                        </svg></a>

                </li>
                <label class="nomsvg">Accueil</label>
                <li><a class="lienSvg" href="index.php?uc=valide"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" viewBox="0 0 60 60" fill="none">
                            <path class="svg" d="M21.25 31.25L26.25 36.25L38.75 23.75"
                                style="stroke-width:3.75; stroke-linecap:round;" />
                            <path class="svg"
                                d="M55 30C55 41.785 55 47.6777 51.3387 51.3387C47.6777 55 41.785 55 30 55C18.2149 55 12.3223 55 8.66117 51.3387C5 47.6777 5 41.785 5 30C5 18.2149 5 12.3223 8.66117 8.66117C12.3223 5 18.2149 5 30 5C41.785 5 47.6777 5 51.3387 8.66117C53.7732 11.0955 54.589 14.5164 54.8623 20"
                                style="stroke-width:3.75; stroke-linecap:round;" />
                        </svg></a>
                </li>
                <label class="nomsvg">Valide</label>
                <li><a class="lienSvg" href="index.php?uc=zoneQuarantaine"><svg xmlns="http://www.w3.org/2000/svg"
                            width="30" height="30" viewBox="0 0 60 60" fill="none">
                            <path class="svg" d="M30 17.5V32.5" style="stroke-width:3.75; stroke-linecap:round;" />
                            <path class="svgFill"
                                d="M30 42.5C31.3807 42.5 32.5 41.3807 32.5 40C32.5 38.6193 31.3807 37.5 30 37.5C28.6193 37.5 27.5 38.6193 27.5 40C27.5 41.3807 28.6193 42.5 30 42.5Z" />
                            <path class="svg"
                                d="M55 30C55 41.785 55 47.6777 51.3387 51.3387C47.6777 55 41.785 55 30 55C18.2149 55 12.3223 55 8.66117 51.3387C5 47.6777 5 41.785 5 30C5 18.2149 5 12.3223 8.66117 8.66117C12.3223 5 18.2149 5 30 5C41.785 5 47.6777 5 51.3387 8.66117C53.7732 11.0955 54.589 14.5164 54.8623 20"
                                style="stroke-width:3.75; stroke-linecap:round;" />
                        </svg></a>
                </li>
                <label class="nomsvg">Quarantaine</label>
                <li><a class="lienSvg" href="index.php?uc=listeAttente"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" viewBox="0 0 59 59" fill="none">
                            <path class="svg"
                                d="M16.5588 16.5588H42.4412M16.5588 29.5H42.4412M16.5588 42.4412H29.5M2 29.5C2 8.47059 8.47059 2 29.5 2C50.5294 2 57 8.47059 57 29.5C57 50.5294 50.5294 57 29.5 57C8.47059 57 2 50.5294 2 29.5Z"
                                style="stroke-width:3.75; stroke-linecap:round;" />
                        </svg></a>
                </li>
                <label class="nomsvg">Liste d'attente</label>
                <li><a class="lienSvg" href="index.php?uc=connexion&action=deconnexion"><svg class="svgFill" height="30"
                            width="30" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.3 490.3" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M0,121.05v248.2c0,34.2,27.9,62.1,62.1,62.1h200.6c34.2,0,62.1-27.9,62.1-62.1v-40.2c0-6.8-5.5-12.3-12.3-12.3
                                s-12.3,5.5-12.3,12.3v40.2c0,20.7-16.9,37.6-37.6,37.6H62.1c-20.7,0-37.6-16.9-37.6-37.6v-248.2c0-20.7,16.9-37.6,37.6-37.6h200.6
                                c20.7,0,37.6,16.9,37.6,37.6v40.2c0,6.8,5.5,12.3,12.3,12.3s12.3-5.5,12.3-12.3v-40.2c0-34.2-27.9-62.1-62.1-62.1H62.1
                                C27.9,58.95,0,86.75,0,121.05z" />
                                    <path d="M385.4,337.65c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l83.9-83.9c4.8-4.8,4.8-12.5,0-17.3l-83.9-83.9
                                c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l63,63H218.6c-6.8,0-12.3,5.5-12.3,12.3c0,6.8,5.5,12.3,12.3,12.3h229.8l-63,63
                                C380.6,325.15,380.6,332.95,385.4,337.65z" />
                                </g>
                            </g>
                        </svg></a>
                </li>

                <label class="nomsvg">Déconnexion</label>
            </ul>
        </nav>
        <?php
    }
    ?>
</header>

<style>
    .navbar {
        width: 90px;
        height: 400px;
        border-radius: 0 14px 14px 0;
        background: #F6F6F6;
        box-shadow: 4px 4px 16.3px 0px rgba(0, 0, 0, 0.25);
        margin: -200px 0;
        position: fixed;
        z-index: 2;
        top: 50%;

    }

    .svg {
        stroke: black;
    }

    .svgFill {
        fill: black;
    }

    ul {
        display: flex;
        align-items: center;
        flex-direction: column;
    }


    li {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 55px;
        height: 55px;
        border-radius: 10px;
        margin: 30px 0 0 0;

        &:hover {
            background: #07B8B8;
            box-shadow: 0px 0px 14.5px 1px rgba(0, 0, 0, 0.25);

            .svg {
                stroke: white;
            }

            .svgFill {
                fill: white;
            }

            +.nomsvg {
                transform: translate(137px, -20px);
                opacity: 1;
                display: flex;
            }

        }
    }


    a {
        padding: 15px;
    }

    .nomsvg {
        display: flex;
        opacity: 0;
        width: 153px;
        height: 35px;
        border-radius: 5px;
        background: #07B8B8;
        box-shadow: 4px 4px 16.3px 0px rgba(0, 0, 0, 0.25);
        align-items: center;
        justify-content: center;
        color: #fff;
        font-family: Poppins, sans-serif;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        transform: translate(137px, -20px);
        margin: -23px 0;
        transition: 0.1s;
        z-index: 1;

    }
</style>