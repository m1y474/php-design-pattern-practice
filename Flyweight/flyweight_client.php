<?php

require_once './ItemFactory.class.php';

function dumpData($data) {
    echo '<dl>';
    foreach ($data as $obj) {
        echo '<dt>'. htmlspecialchars($obj->getName(), ENT_QUOTES, mb_internal_encoding()).'</dt>';
        echo '<dd>商品番号:'.$obj->getCode().'</dd>';
        echo '<dd>\\'.number_format($obj->getPrice()).'-</dd>';
    }
    echo '</dl>';
}
$factory = ItemFactory::getInstance('./data.txt');

/**
 * データを取得する
 */
$items = [];
$items[] = $factory->getItem('ABC0001');
$items[] = $factory->getItem('ABC0002');
$items[] = $factory->getItem('ABC0003');

if ($items[0] === $factory->getItem('ABC0001')) {
    echo '同一オブジェクトです';
} else {
    echo '同一オブジェクトではありません';
}
