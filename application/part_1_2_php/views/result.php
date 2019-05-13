<?php

use components\Viewer;
use data_objects\FormShippingSelectDataObject;

/** @var $this Viewer */
/** @var $params FormShippingSelectDataObject */

$params = $this->params;

?>

<h1>Тестирование API Shiptor 1.2</h1>
<a href="index.html">На главную</a>
<br>
<br>

<h1>Выбор города для доставки</h1>
<p>Вы выбрали доставку с ID # <?= $params->shippingId ?></p>

