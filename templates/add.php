

<section id="add">
    <form action="" method="POST">
        <div>
            <h2 data-mlr-text>Créer une soirée</h2>
            <div>
                <label data-mlr-text>Nom :</label>
                <input type="text" name="add_name" value="<?php echo $_POST['nom']?>" required>
            </div>
            <div>
                <label for="dob" data-mlr-text>Date :</label>
                <?php include('add_dob.php'); ?>
            </div>
            <div>
                <label for="time" data-mlr-text>Heure :</label>
                <?php include('add_heure.php'); ?>
            </div>
            <div>
                <label data-mlr-text>Ville :</label>
                <input type="text" id="citySearch" name="add_ville" value="<?php echo $_POST['ville']?>" required>
            </div>
            <div>
                <label data-mlr-text>Adresse :</label>
                <input type="text" name="add_adresse" value="<?php echo $_POST['adresse']?>" required>
            </div>
            <div>
                <label data-mlr-text>Prix :</label>
                <input type="text" name="add_prix" value="<?php echo $_POST['prix']?>" required>
            </div>
            <div>
                <label data-mlr-text>Places :</label>
                <input type="text" name="add_place" value="<?php echo $_POST['place']?>" required>
            </div>
            <div>
                <label data-mlr-text>Organisateur :</label>
                <input type="text" name="add_org" value="<?php echo $_POST['org']?>" required>
            </div>
            <div>
                <label>Description :</label>
                <textarea name="add_description" required></textarea>
            </div>
        </div>

        <?php
            if (isset($add_error)){
                echo "<p data-mlr-text class=error>" . $add_error . "</p>";
            }
        ?>
    
        <button class="bouton" name="add_btn" data-mlr-text>Créer une soirée</button>
    </form>
</section>

<script>
    var villes = new Array();

    const capitalize = (s) => {
        if (typeof s !== 'string') return ''
            return s.charAt(0).toUpperCase() + s.slice(1).toLowerCase()
    }

    $(document).ready(function () {
        $.getJSON('../assets/api/france.json', function(data) {
            $.each(data, function(key, value){
                   villes.push(capitalize(value['Nom_commune']));
            });
        });
        var input = document.getElementById("citySearch");
        new Awesomplete(input, { list: villes, minChars: 3, maxItems: 5});
    });
</script>
