<div class="selection">
    <select name="classe" id="selector">
        <option value="choisissez">choisissez</option>
        <option value="seconde">seconde</option>
        <option value="premiere">premiere</option>
        <option value="terminale">terminale</option>
        <option value="bts">bts</option>
        <option value="prepa">prepa</option>
    </select>

    <?php
        $classes = ['seconde', 'premiere', 'terminale', 'bts', 'prepa'];
        foreach ($classes as $classe) {
            $eleves = $pdo->getEleve($classe);
    ?>
        <select name="eleves" id="<?php echo $classe; ?>" class="classe-select">
            <?php
                foreach ($eleves as $eleve) {
            ?>
                    <option value=""><?php echo $eleve['nom']; ?> <?php echo $eleve['prenom']; ?></option>
            <?php
                }
            ?>
        </select>
    <?php
        }
    ?>
</div>

<script>
    var selector = document.getElementById('selector');
    var classeSelects = document.querySelectorAll('.classe-select');

    selector.addEventListener('change', function () {
        classeSelects.forEach(function (select) {
            select.style.display = 'none';
        });

        var selectedValue = selector.value;
        var trouver = document.getElementById(selectedValue);

        if (trouver) {
            trouver.style.display = 'block';
        }
    });
</script>
