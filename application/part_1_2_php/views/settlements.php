<?php

use components\Viewer;
use constants\ActionConstants;
use constants\FormConstants;
use data_objects\FormSettlementSearchDataObject;

/** @var $this Viewer */
/** @var $params FormSettlementSearchDataObject */

$params = $this->params;

switch ($this->action) {
    case ActionConstants::ACTION_INITIAL:
        $settlements = $this->response['result']['settlements'] ?? [];
        break;
    case ActionConstants::ACTION_SEARCH_SETTLEMENT:
        $settlements = $this->response['result'] ?? [];
        break;
}

if (!empty($settlements)) {
    array_unshift($settlements, ['kladr_id' => 0, 'name' => 'Выбирете город']);
} else {
    array_unshift($settlements, ['kladr_id' => 0, 'name' => 'Ничего не найдено']);
}


?>

<h1>Тестирование API Shiptor 1.2</h1>
<a href="index.html">На главную</a>
<br>
<br>

<h1>Выбор города для доставки</h1>

<form method="post">
    <label for="settlements_search_input">Поиск города по названию</label>
    <input id="settlements_search_input" type="text"
           name="<?= FormConstants::FORM_NAME_SETTLEMENT_SEARCH_INPUT ?>"
           value="<?= $params->searchString ?? '' ?>">
    <input type="hidden"
           name="<?= FormConstants::FORM_NAME_ACTION ?>"
           value="<?= ActionConstants::ACTION_SEARCH_SETTLEMENT ?>">
    <button type="submit">Поиск</button>
</form>

<form method="post">
    <label for="settlements_list">Выбрать город</label>
    <select id="settlements_list" name="<?= FormConstants::FORM_NAME_SETTLEMENT_SELECT_ID ?>">
        <?php
        foreach ($settlements as $settlement) {
            echo "<option value='{$settlement['kladr_id']}'>{$settlement['name']}</option>";
        }
        ?>
    </select>
    <input type="hidden"
           name="<?= FormConstants::FORM_NAME_ACTION ?>"
           value="<?= ActionConstants::ACTION_SELECT_SETTLEMENT ?>"
    />
    <button type="submit">Выбрать</button>

</form>

