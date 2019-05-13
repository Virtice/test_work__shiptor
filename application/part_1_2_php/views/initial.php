<?php

/** @var $params \application\part_1_2_php\data_objects\InitialDataObject */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тестирование API Shiptor 1.2 (php)</title>
    <style>
        label {
            display: inline-block;
            min-width: 250px;
        }

        input {
            min-width: 150px;
        }

        select {
            min-width: 156px;
        }
    </style>
</head>
<body>
    <h1>Тестирование API Shiptor 1.2</h1>
    <a href="index.html">На главную</a>
    <br>
    <br>
    <div id="api_output"><?= $responseJson ?></div>


    <section id="settlements">
        <br>
        <label for="settlements_search_input">Поиск города по названию</label>
        <input type="text" id="settlements_search_input">
        <button id="settlements_search_button">Поиск</button>
        <br>
        <label for="settlements_list">Выбрать город</label>
        <select id="settlements_list">
            <?php
            foreach ($settlements as $settlement) {
                echo "<option value='{$settlement['kladr_id']}'>{$settlement['name']}</option>";
            }
            ?>
        </select>
    </section>

    <section id="shipping" style="display: none">
        <br>
        <label for="shipping_list">Выбрать доставку</label>
        <select id="shipping_list"></select>
    </section>
</body>
</html>
