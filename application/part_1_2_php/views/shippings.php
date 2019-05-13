<?php

use components\Viewer;
use constants\ActionConstants;
use constants\FormConstants;
use data_objects\FormSettlementSelectDataObject;

/** @var $this Viewer */
/** @var $params FormSettlementSelectDataObject */

$params = $this->params;

$shippings = $this->response['result']['methods'] ?? [];
?>

<h1>Тестирование API Shiptor 1.2</h1>
<a href="index.html">На главную</a>
<br>
<br>

<h1>Выбор пункта для доставки</h1>

<form method="post">
    <label for="settlements_list">Выбрать доставку</label>
    <select id="settlements_list" name="<?= FormConstants::FORM_NAME_SHIPPING_SELECT_ID ?>">
        <option value="0">Выбирете доставку</option>
        <?php
        foreach ($shippings as $shipping) {
            $name = sprintf('%s, %s, %s', $shipping['cost']['total']['readable'], $shipping['days'], $shipping['method']['name']);
            echo "<option value='{$shipping['method']['id']}'>{$name}</option>";
        }
        ?>
    </select>
    <input type="hidden"
           name="<?= FormConstants::FORM_NAME_ACTION ?>"
           value="<?= ActionConstants::ACTION_SELECT_SHIPPING ?>"
    />
    <button type="submit">Выбрать</button>

</form>

