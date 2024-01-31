<?php
$pdo = Pdocourrier::getPdocourrier();
?>
<div class="tableau" style="display: flex;
    flex-direction: column;
    align-items: center;">
    <table style="width:60%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom Prénom</th>
                <th>Classe</th>
                <th>Administrateur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $messages = $pdo->getMessages();
                foreach ($messages as $message) {
                    $eleve = $pdo->getEleveByID($message["id_user"]);

                    $admin = $pdo->getAdminNameByID($message["id_controler"]);

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
                        <?php
                        if (isset($admin['nom']) && isset($admin['prenom'])) {
                            echo $admin['nom'];
                            echo $admin['prenom'];
                        } else {
                            echo "Pas en control";
                        }
                        ?>


                    </td>
                    <td style="display:none"></td>


                </tr>
                </form>

                <?php
                }
                ?>

            <td style='display:none'></td>
            </tr>
        </tbody>
    </table>
</div>