<?php
session_start();
require_once("util/class.PDO.PdoCourrier.inc.php");

include("vues/v_entete.php");
require_once("vues/navbar.php");


if (!isset($_REQUEST['uc'])) {
    $uc = 'connexion';
} else {
    $uc = $_REQUEST['uc'];

}

switch ($uc) {
    case 'connexion': {
            include('controlers/c_verifConnex.php');
            include('vues/v_connexion.php');

            break;
        }
    case 'adminPanel': {
            include('controlers/c_verifMessages.php');
            include('vues/v_adminPanel.php');
            break;
        }
    case 'valide': {
            include('controlers/c_messageValide.php');
            include('vues/v_messageValide.php');
            break;
        }
    case 'zoneQuarantaine': {
            include('controlers/c_messageQuarantaine.php');
            include('vues/v_zoneQuarantaine.php');
            break;
        }
    case 'select': {
            include('controlers/c_verifMessages.php');
            include('vues/v_select.php');
            break;
        }
    case 'adminpanel2': {
            include('controlers/c_verifMessages2.php');
            include('vues/v_adminpanel2.php');

            break;
        }
    case 'listeAttente': {
            include('vues/v_liste.php');

            break;
        }
}
include("vues/v_footer.php");
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        min-height: 100dvh;
    }

    .container {
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 20px;
        margin-top: -100px;

        form button {
            width: 300px;
            height: 50px;
            background-color: rgb(7, 184, 184);
            cursor: pointer;
            border: 1px solid black;
            font-size: 20px;
        }

        input {
            height: 50px;
            width: 300px;
            padding-left: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
    }

    .panel {
        color: aqua;
    }

    .adminpanel {
        display: flex;
        align-items: center;
        flex-direction: column;

        h1 {
            margin-top: 50px;
        }
    }

    .container-panel {
        display: flex;
        flex-direction: row;
        gap: 200px;
        margin-top: 100px;
    }

    .left td p {
        cursor: pointer;
    }

    .right {
        width: 500px;
        height: 600px;
        background-color: aqua;
        border: 1px solid black;

        form {
            display: flex;
            align-items: center;
            flex-direction: column;
            margin-top: 50px;
            gap: 50px;
            display: none;

            p {
                max-width: 400px;
            }
        }
    }

    .zoneQuarantaine {
        display: flex;
        justify-content: center;
        margin-top: 100px;
    }

    .messagesValide {
        display: flex;
        justify-content: center;
        flex-direction: column;
        width: 100vw;
        align-items: center;
        margin-top: 100px;
    }

    .classe-select {
        display: none;
    }

    .containerTraitement {
        background: #f6f6f6;
        box-shadow: 0px 0px 16.3px 0px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 300px;
        padding: 20px 39px;
        gap: 18px;
        font-size: 18px;
        min-width: 400px;
        max-width: 60%;

        svg {
            width: 50px;
        }

        p {
            overflow: auto;

            &::-webkit-scrollbar-track {
                border: 1px solid #f6f6f6;
                padding: 1px 0;
                background-color: #f6f6f6;
            }

            &::-webkit-scrollbar {
                width: 5px;
            }

            &::-webkit-scrollbar-thumb {
                border-radius: 10px;
                box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
                background-color: #07B8B8;
            }
        }

        div {
            display: flex;
            align-items: center;
            width: 100%;

            span {
                background-color: #07B8B8;
                width: 100%;
                box-sizing: border-box;
                left: 0;
                right: 0;
                position: relative;
                border-radius: 10px;
                height: 5px;
                display: flex;
                margin: 0 10px;
            }
        }

    }

    .boutonsTraitement {
        display: flex;
        justify-content: flex-end;
        position: fixed;
        bottom: 40px;
        left: 50%;
        margin-left: -170px;

        input {
            margin: 0 10px;
            height: 48px;
            width: 150px;
            border: none;
            border-radius: 10px;
            box-shadow: 4px 4px 15px -4px rgba(0, 0, 0, 0.233);
            font-family: Poppins, sans-serif;
            font-size: 14px;
            background: #f6f6f6;

            &:hover {
                box-shadow: 5px 5px 15px -4px rgba(0, 0, 0, 0.533);
                transition: 0.2s;
                color: white;

                &:nth-child(1) {
                    background: #07B8B8;

                }

                &:nth-child(2) {
                    background: #FF5454;
                }
            }

        }



    }

    header {
        display: flex;
    }

    .boutonsTraitement input[type="button"] {
        margin-left: 10px;
    }

    .radio-list {
        display: flex;
        flex-direction: column;
        background: white;
        min-height: 200px;
        width: 350px;
        border-radius: 8px;
        gap: 25px;
        padding: 20px;
    }

    @import url("https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300;400;700&display=swap");

    .overlay {
        display: flex;
        position: fixed;
        background: #00000066;
        align-items: center;
        justify-content: center;
        width: 100vw;
        height: 100vh;
        text-align: center;
        top: 0;
        left: 0;
    }

    .radio-item input[type="text"] {
        display: block;
        border-radius: 8px;
        border: 2px solid var(--clr);
        width: 100%;
        height: 40px;
        margin: 20px 0;
    }

    .radio-item [type="radio"] {
        display: none;
    }

    .radio-item label {
        font-family: poppins, sans-serif;
    }

    .radio-item+.radio-item {
        margin-top: 15px;
    }

    .radio-item label {
        display: block;
        padding: 20px 60px;
        background: transparent;
        border: 2px solid var(--clr);
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        font-weight: 400;
        min-width: 250px;
        white-space: nowrap;
        position: relative;
        transition: 0.4s ease-in-out 0s;
    }

    .radio-item label:after,
    .radio-item label:before {
        content: "";
        position: absolute;
        border-radius: 50%;
    }

    .radio-item label:after {
        height: 19px;
        width: 19px;
        border: none;
        left: 19px;
        top: calc(50% - 12px);
    }

    .radio-item label:before {

        height: 20px;
        width: 20px;
        left: 21px;
        top: calc(50%-5px);
        opacity: 0;
        visibility: hidden;
        transition: 0.4s ease-in-out 0s;
    }

    .radio-item [type="radio"]:checked~label {
        border-color: var(--clr);
        background: var(--clr);
        color: white;
    }

    .radio-item [type="radio"]:checked~label::before {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
    }





    .tableau table {
        font-family: poppins, sans-serif;
    }

    .tableau th {
        padding: 10px;
        background: #c6c6c6;
        border-radius: 5px;


    }

    .tableau td {
        padding: 10px;
        background: #f6f6f6;
        border-radius: 5px;

    }

    .tableau {
        text-align: center;
    }

    .tableau th:nth-child(2) {
        padding: 10px 50px;
    }

    .tableau th:nth-child(3) {
        padding: 10px 30px;
    }


    .tableau td:nth-last-child(1):hover {
        cursor: pointer;
        background: #c6c6c6;
    }

    .message-section {
        display: none;
    }

    .messageContainer {
        background: #f6f6f6;
        box-shadow: 0px 0px 16.3px 0px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 300px;
        padding: 20px 39px;
        gap: 18px;
        font-size: 18px;
        min-width: 400px;
        max-width: 80%;

        img {
            width: 50px;
        }

        p {
            overflow: auto;

            &::-webkit-scrollbar-track {
                border: 1px solid #f6f6f6;
                padding: 1px 0;
                background-color: #f6f6f6;
            }

            &::-webkit-scrollbar {
                width: 5px;
            }

            &::-webkit-scrollbar-thumb {
                border-radius: 10px;
                box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
                background-color: #07B8B8;
            }
        }

        div {
            display: flex;
            align-items: center;
            width: 100%;

            span {
                background-color: #07B8B8;
                width: 100%;
                box-sizing: border-box;
                left: 0;
                right: 0;
                position: relative;
                border-radius: 10px;
                height: 5px;
                display: flex;
                margin: 0 10px;
            }
        }

    }

    .boutonsTraitement2 {
        display: flex;
        justify-content: flex-end;
        position: fixed;
        bottom: 40px;
        left: 50%;
        margin-left: -170px;

        input {
            margin: 0 10px;
            height: 48px;
            width: 150px;
            border: none;
            border-radius: 10px;
            box-shadow: 4px 4px 15px -4px rgba(0, 0, 0, 0.233);
            font-family: Poppins, sans-serif;
            font-size: 14px;
            background: #f6f6f6;

            &:hover {
                box-shadow: 5px 5px 15px -4px rgba(0, 0, 0, 0.533);
                transition: 0.2s;
                color: white;

                &:nth-child(1) {
                    background: var(--clr1);

                }

                &:nth-child(2) {
                    background: var(--clr);

                }
            }

        }


    }

    #searchInput {
        width: 60%;
        height: 40px;
        border-radius: 8px;
        border: 1px solid black;
        margin: 10px 0;
        padding: 0 10px;
    }

    .voir {
        width: 100%;
        background: transparent;
        border: 0;
    }

    .msgVisual {
        width: 476px;
        min-height: 386px;
        background-color: #c6c6c6;
        font-family: poppins, sans-serif;
        border-radius: 8px;
        text-align: center;

        h2 {
            font-size: 30px;
        }

        .boutons input {
            a {
                text-decoration: none;
                color: black;

            }

            margin: 0 10px;
            height: 48px;
            width: 150px;
            border: none;
            border-radius: 10px;
            box-shadow: 4px 4px 15px -4px rgba(0, 0, 0, 0.233);
            font-family: Poppins,
            sans-serif;
            font-size: 14px;
            background: #f6f6f6;

            &:hover {
                box-shadow: 5px 5px 15px -4px rgba(0, 0, 0, 0.533);
                transition: 0.2s;
                color: white;

                &:nth-child(1) {
                    background: #07B8B8;

                }

                &:nth-child(2) {
                    background: #FF5454;
                }
            }
        }

        form {
            display: flex;
            align-items: center;
            flex-direction: column;
            margin-top: 50px;
            gap: 50px;
            display: none;

            p {
                padding: 0px 10px;
            }
        }
    }


    .btnTraitement {
        background: transparent;
        width: 150px;
        height: 46px;
        border-radius: 8px;
        border: 2px solid var(--clr);
        font-family: poppins, sans-serif;
        transition: 0.4s;
    }

    .btnTraitement:hover {
        color: white;
        background: var(--clr);
    }

    .refuser {
        background-color: #FF5454;
    }

    .valider {
        background-color: #07B8B8;
    }

    :root {
        --clrAction: initial;
    }

    .tableau .action {
        background: var(--clrAction);
    }
</style>

<script>


    //Je ne sais pas a quoi sert cce qu'il y a juste au dessus


    try {
        document.querySelector('input[name="motif"][value="autre"]').addEventListener('change', function () {
            if (this.checked) {
                document.getElementById('autre_motif_field').style.display = 'block';
            } else {
                document.getElementById('autre_motif_field').style.display = 'none';
            }
        });

    } catch (e) {

    }

    //SearchBar
    function filterTable() {
        // Récupérer la valeur saisie dans la barre de recherche
        var filter = document.getElementById('searchInput').value.toUpperCase();

        // Récupérer les lignes du corps du tableau (en excluant l'en-tête)
        var rows = document.getElementById("messagesTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        // Parcourir toutes les lignes du corps du tableau et cacher celles qui ne correspondent pas à la recherche
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < cells.length && !found; j++) {
                var cellText = cells[j].textContent || cells[j].innerText;
                if (cellText.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
            rows[i].style.display = found ? "" : "none";
        }
    }

    function filterTableLogs(messageId) {
        // Récupérer toutes les lignes de la table logsTable
        document.getElementById('logsTable').style.display = "revert";
        var rows = document.querySelectorAll('#logsTable tbody tr');

        // Parcourir chaque ligne
        rows.forEach(function (row) {
            // Récupérer l'ID du message dans la première colonne de la ligne
            var messageIdCell = row.querySelector('td:first-child');
            var id = messageIdCell.textContent;

            // Vérifier si l'ID du message correspond à celui cliqué
            if (id.trim() === messageId.toString().trim()) {
                // Vérifier l'action de la ligne (refuser ou valider)
                var actionCell = row.querySelector('td:nth-child(4)');
                var action = actionCell.textContent.trim().toLowerCase();

                // Modifier la couleur d'arrière-plan en fonction de l'action
                if (action === 'refuser') {
                    row.style.setProperty('--clrAction', '#FF5454'); // Rouge
                } else if (action === 'valider') {
                    row.style.setProperty('--clrAction', '#07B8B8'); // Bleu
                }

                // Afficher la ligne
                row.style.display = 'table-row';
            } else {
                // Masquer la ligne si l'ID ne correspond pas
                row.style.display = 'none';
            }
        });
    }

    try {
        // Associer la fonction filterTable() à l'événement input de la barre de recherche
        document.getElementById('searchInput').addEventListener('input', filterTable);
    } catch (e) {

    }

    function showRadioSectionWithID(id) {
        document.querySelector('.radio-section').style.display = 'flex';
        var messageInput = document.getElementById('message_id');
        if (messageInput) {
            messageInput.value = id;
        } else {
            console.error("Message input element not found");
        }
    }
    function showRadioSection() {
        document.querySelector('.radio-section').style.display = 'flex';
    }

    function hideRadioSection() {
        document.querySelector('.radio-section').style.display = 'none';
    }

    function showValideSectionWithID(id) {
        document.querySelector('.valide-section').style.display = 'flex';
        var messageInput = document.getElementById('message_id');
        if (messageInput) {
            messageInput.value = id;
        } else {
            console.error("Message input element not found");
        }
    }
    function showValideSection() {
        document.querySelector('.valide-section').style.display = 'flex';
    }
    function hideValideSection() {
        document.querySelector('.valide-section').style.display = 'none';
    }


    function hideMessageSection() {
        document.querySelector('.message-section').style.display = 'none';
    }


    //Affiche le message avec le bouton VOIR
    // let idMessage=0;

    function showMessageSection(id) {
        // idMessage=id;
        // var messageInput = document.getElementById('message_id');
        // if (messageInput) {
        //     messageInput.value = id;
        // } else {
        //     console.error("Message input element not found");
        // }
        // // message='Lorem \n Ipsum';
        // // document.querySelector('.message-section p').innerText = message;
        // // document.querySelector('message-section p').innerText = "Lorem Ipsum";
        document.querySelector('.message-section').style.display = 'flex';
    }

    // function setIdMessage(id){
    //     idMessage=id;
    // }

    function getIdMessage() {
        return IdMessage;
    }


</script>