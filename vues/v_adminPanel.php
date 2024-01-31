<div class="adminpanel">
    <?php
    echo $_SESSION['admin'];
    ?>
    <h1>GESTION DES UTILISATEURS</h1>
    <div class="container-panel">
        <div class="left">
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Prénom</th>
                        <th>Classe</th>
                        <th>Message</th>
                    </tr>
                <tbody>
                    <?php
                    $messages = $pdo->getMessages();

                    foreach ($messages as $message) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $message['id']; ?>
                            </td>
                            <td>
                                <?php echo $message['nom']; ?>
                                <?php echo $message['prenom']; ?>
                            </td>
                            <td>
                                <?php echo $message['classe']; ?>
                            </td>
                            <td>
                                <p class="voir">VOIR</p>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                </thead>
            </table>
        </div>

        <div class="right">
            <?php
            foreach ($messages as $message) {
                ?>
                <form action="" method="POST" class="lettre"> <!-- Change id to class -->
                    <h2>Lettre</h2>
                    <p>
                        <?php echo $message['message']; ?>
                    </p>
                    <div class="boutons">
                        <button type="submit"><a
                                href="index.php?uc=adminPanel&action=quarantaine&id=<?php echo $message['id']; ?>">QUARANTAINE</a></button>
                        <button type="submit"><a
                                href="index.php?uc=adminPanel&action=ValideMessage&id=<?php echo $message['id']; ?>">VALIDER</a></button>
                    </div>
                </form>
                <?php
            }
            ?>
        </div>
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
            lettreForms[index].style.display = 'block';
        });
    });
</script>