<?php

use application\part_1_2_php\constants\ActionConstants;

$settlements = $response['result']['settlements'];

?>

<h1>Тестирование API Shiptor 1.2</h1>
<a href="index.html">На главную</a>
<br>
<br>

<h1>Выбор города для доставки</h1>

<form method="post">
    <label for="settlements_search_input">Поиск города по названию</label>
    <input type="text" id="settlements_search_input">
    <input type="hidden" name="action" value="<?= ActionConstants::ACTION_SEARCH_SETTLEMENT ?>">
    <button type="submit" id="settlements_search_button">Поиск</button>
</form>

<form method="post">
    <label for="settlements_list">Выбрать город</label>
    <select id="settlements_list">
        <?php
        foreach ($settlements as $settlement) {
            echo "<option value='{$settlement['kladr_id']}'>{$settlement['name']}</option>";
        }
        ?>
    </select>
    <input type="hidden" name="action" value="<?= ActionConstants::ACTION_SELECT_SETTLEMENT ?>">
</form>

