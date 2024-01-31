<form method="post" style="display:flex;justify-content:center;">
    <div style="    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    width: 100vw;
    height: 100vh;
    flex-direction: column;">
        <h1 style="font-family:poppins,sans-serif;    margin: 20px 0;">Controle de messages</h1>


        <div class="containerTraitement">
            <div>
                <span></span>
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M22 14.0001C22 17.7713 22 19.6569 20.8284 20.8285C19.6569 22.0001 17.7712 22.0001 14 22.0001H10C6.22876 22.0001 4.34315 22.0001 3.17157 20.8285C2 19.6569 2 17.7713 2 14.0001C2 10.2288 2 8.34322 3.17157 7.17164C3.82475 6.51846 4.69989 6.22944 6 6.10156M18 6.10156C19.3001 6.22944 20.1752 6.51846 20.8284 7.17164C21.4816 7.82481 21.7706 8.69993 21.8985 10"
                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M10 6H14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M11 9H13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M14 2.00195C15.7066 2.01642 16.6474 2.11117 17.2678 2.73158C18 3.46381 18 4.64232 18 6.99935V9.0626C18 9.52324 18 9.75356 17.9056 9.95513C17.8112 10.1567 17.6342 10.3041 17.2804 10.599L16.5607 11.1987M10 2.00195C8.29344 2.01642 7.35264 2.11117 6.73223 2.73158C6 3.46381 6 4.64232 6 6.99935V9.0626C6 9.52324 6 9.75356 6.09441 9.95513C6.18882 10.1567 6.36576 10.3041 6.71963 10.599L8.1589 11.7984C9.99553 13.329 10.9139 14.0942 12 14.0942C12.6493 14.0942 13.2386 13.8207 14 13.2738"
                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                </svg>
                <span></span>
            </div>
                <?php 
                $chaine = $msg[0][4];
                if (strpos($chaine, "http://localhost/courrierducoeur/imgUsers") !== false ) {
                    ?>
                    <a href="<?php echo $msg[0][4] ?>" target="_blank"><img src="<?php echo $msg[0][4] ?>"></a>
                    <?php
                } else {
                    ?>
                    <p><?php echo $msg[0][4] ?></p>
                    <?php
                }
                ?>
        </div>

        <div class="boutonsTraitement">
            <input name="valider" type="button" value="Valider" onclick="showValideSection()">
            <input name="refuser" type="button" value="Refuser" onclick="showRadioSection()">
        </div>
    </div>



    <div class="radio-section overlay" style="display:none;--clr:#FF5454;">
        <div class="radio-list">
            <h3 style="font-family:poppins,sans-serif;font-size:25px;">Veuillez renseigner le motif du refus</h3>

            <div class="radio-item">
                <input type="radio" name="motif" value="langageinapproprie" id="langageinapproprie">
                <label for="langageinapproprie">Langage inapproprié</label>
            </div>

            <div class="radio-item">
                <input type="radio" name="motif" value="manquebienveillance" id="manquebienveillance">
                <label for="manquebienveillance">Manque de bienveillance</label>
            </div>

            <div class="radio-item">
                <input type="radio" name="motif" value="horsujet" id="horsujet">
                <label for="horsujet">Hors sujet</label>
            </div>

            <div class="radio-item">
                <input type="radio" name="motif" value="autre" id="autre">
                <label for="autre">Autre (Veuillez préciser)</label>
                <input type="text" name="autre_motif" id="autre_motif_field" style="display:none;" autocomplete="off">
            </div>

            <div class="radio-item">
                <input class="btnTraitement" name="annulerquarantaine" type="button" value="Annuler"
                    onclick="hideRadioSection()">
                <input class="btnTraitement" name="quarantaine" type="submit" value="Refuser">


            </div>
        </div>
    </div>

    <div class="valide-section overlay" style="display:none;--clr:#07B8B8;">
        <div class="radio-list">
            <h3 style="font-family:poppins,sans-serif;font-size:25px;">Etes vous sûr de vouloir valider ce message ?
            </h3>
            <div class="radio-item">
                <input class="btnTraitement" name="annulerquarantaine" type="button" value="Annuler"
                    onclick="hideValideSection()">
                <input class="btnTraitement" name="valider" type="submit" value="Valider">
            </div>
        </div>
    </div>
</form>