<div class="dob">
    <select class="day" name='signin_day'>
        <option value='' data-mlr-text>Jour</option>
        <?php
            for ($i = 1; $i < 32; $i++) {
                echo '<option value=\'' . $i . '\'>' . $i . '</option>';
            }
        ?>
    </select>

    <select class="month" name='signin_month'>
        <option value='' data-mlr-text>Mois</option>
        <?php
            for ($i = 1; $i < 13; $i++) {
                echo '<option value=\'' . $i . '\'>' . $i . '</option>';
            }
        ?>
    </select>

    <select class="year" name='signin_year'>
        <option value='' data-mlr-text>Année</option>
        <?php
            for ($i = 1950; $i < 2021; $i++) {
                echo '<option value=\'' . $i . '\'>' . $i . '</option>';
            }
        ?>
    </select>
</div>
