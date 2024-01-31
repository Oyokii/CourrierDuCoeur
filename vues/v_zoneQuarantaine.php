<div class="messagesValide tableau">
    <h1 style="    font-family: poppins,sans-serif;">Zone valide</h1>
    <input type="text" id="searchInput" placeholder="Rechercher...">

    <div style="display:flex;flex-direction:row;">
        <div>
            <table id="messagesTable" style="    width: 60%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Prénom</th>
                        <th>Classe</th>
                        <th>Motif</th>
                        <th>Message</th>
                    </tr>
                <tbody>


                    <?php
                    $messages = $pdo->getMessagesQuarantaine();
                    foreach ($messages as $message) {
                        $eleve = $pdo->getEleveByID($message["id_user"]);
                        ?>
                        <form method="post">
                            <tr>
                                <td>
                                    <?php echo $message['id']; ?>
                                </td>
                                <td>
                                    <?php echo $eleve['nom']; ?>
                                    <?php echo $eleve['prenom']; ?>
                                </td>
                                <td>
                                    <?php echo $eleve['classe']; ?>
                                </td>
                                <td>
                                    <?php echo $message['motif'] ?>
                                </td>
                                <td type="button" onclick="filterTableLogs(<?php echo $message['id'] ?>)" class="voir">
                                    <p name="voir">VOIR</p>
                                </td>

                            </tr>
                        </form>

                        <?php
                    }
                    ?>


                </tbody>
                </thead>
            </table>
        </div>
        <div>

            <div class="msgVisual">

                <?php
                foreach ($messages as $message) {
                    ?>

                    <form action="" method="POST" class="lettre"> <!-- Change id to class -->
                        <h2>Lettre</h2>
                        <p>
                        <?php 
                            $chaine = $message['message'];
                            if (strpos($chaine, "http://localhost/courrierducoeur/imgUsers") !== false ) {
                                ?>
                                <a href="<?php echo $message['message'] ?>" target="_blank"><img src="<?php echo $message['message'] ?>" width="200px" height="100px"></a>
                                <?php
                            } else {
                                ?>
                                <p><?php echo $message['message'] ?></p>
                                <?php
                            }
                        ?>
                        </p>
                        <div class="boutons">
                            <input type="hidden">

                            <input onclick="showRadioSectionWithID(<?php echo $message['id']; ?>) " type="button"
                                value="REFUSER">
                        </div>


                    </form>
                    <?php
                }
                ?>
            </div>
        </div>

        <form action="" method="post">
            <div class="valide-section overlay" style="display:none;--clr:#07B8B8;">
                <input type="hidden" name="message_id" id="message_id">
                <div class="radio-list">
                    <h3 style="font-family:poppins,sans-serif;font-size:25px;">Etes vous sûr de vouloir valider ce
                        message ?
                    </h3>

                    <div class="radio-item">
                        <input class="btnTraitement" name="annulerquarantaine" type="button" value="Annuler"
                            onclick="hideValideSection()">
                        <input class="btnTraitement" name="valider" type="submit" value="Valider">


                    </div>
                </div>
            </div>
        </form>
    </div>
    <h2 style="    font-family: poppins,sans-serif;
    margin: 20px 0;">Logs</h2>
    <table id="logsTable" style="    display:none;margin:50px 0;width: 60%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom administrateur</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        <tbody>


            <?php
            $logs = $pdo->getLogs();

            foreach ($logs as $log) {
                $admin = $pdo->getAdminNameByID($log["id_controler"]);
                ?>
                <form method="post">
                    <tr>
                        <td>
                            <?php echo $log['id_msg']; ?>
                        </td>
                        <td>
                            <?php echo $admin['nom']; ?>
                            <?php echo $admin['prenom']; ?>
                        </td>
                        <td>
                            <?php echo $log['date']; ?>
                        </td>
                        <td class="action">
                            <?php echo $log['action'] ?>
                        </td>
                        <td style="display:none"></td>

                    </tr>
                </form>

                <?php
            }
            ?>


        </tbody>
        </thead>
    </table>


</div>
</div>




<script>
    var voirButtons = document.querySelectorAll('.voir');
    var lettreForms = document.querySelectorAll('.lettre');

    voirButtons.forEach(function (voir, index) {
        voir.addEventListener('click', function () {
            lettreForms.forEach(function (form) {
                form.style.display = 'none';
            });
            lettreForms[index].style.display = 'flex';
        });
    });
</script>