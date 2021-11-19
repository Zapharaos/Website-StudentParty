<div class="heure">
    <select class="hour" name='add_hour'>
        <option value='' data-mlr-text>Heure</option>
        <?php
            for ($i = 0; $i < 23; $i++) {
                echo '<option value=\'' . $i . '\'>' . $i . '</option>';
            }
        ?>
    </select>

    <select class="min" name='add_min'>
        <option value=''>Minute</option>
        <?php
            for ($i = 0; $i < 59; $i++) {
                echo '<option value=\'' . $i . '\'>' . $i . '</option>';
            }
        ?>
    </select>
</div>