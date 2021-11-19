<div class="dob">
    <select class="day" name='add_day'>
        <option value='' data-mlr-text>Jour</option>
        <?php
            for ($i = 1; $i < 32; $i++) {
                echo '<option value=\'' . $i . '\'>' . $i . '</option>';
            }
        ?>
    </select>

    <select class="month" name='add_month'>
        <option value='' data-mlr-text>Mois</option>
        <?php
            for ($i = 1; $i < 13; $i++) {
                echo '<option value=\'' . $i . '\'>' . $i . '</option>';
            }
        ?>
    </select>

    <select class="year" name='add_year'>
        <option value='' data-mlr-text>Année</option>
        <?php
            for ($i = 2020; $i < 2030; $i++) {
                echo '<option value=\'' . $i . '\'>' . $i . '</option>';
            }
        ?>
    </select>
</div>
