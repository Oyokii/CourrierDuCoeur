

//Je ne sais pas a quoi sert cce qu'il y a juste au dessus


try{
    document.querySelector('input[name="motif"][value="autre"]').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('autre_motif_field').style.display = 'block';
        } else {
            document.getElementById('autre_motif_field').style.display = 'none';
        }
    });

}catch(e){

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
        document.getElementById('logsTable').style.display="revert";
        var rows = document.querySelectorAll('#logsTable tbody tr');
    
        // Parcourir chaque ligne
        rows.forEach(function(row) {
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
    
    try{
        // Associer la fonction filterTable() à l'événement input de la barre de recherche
        document.getElementById('searchInput').addEventListener('input', filterTable);
    }catch(e){

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

    function getIdMessage(){
        return IdMessage;
    }

    