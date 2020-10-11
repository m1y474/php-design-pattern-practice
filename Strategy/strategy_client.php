<?php

require_once('./ItemDataContext.class.php');
require_once('./ReadJsonLengthDataStrategy.class.php');
require_once('./ReadTabSeparatedDataStrategy.class.php');

function dumpData($data)
{
    echo '<dl>';
    foreach ($data as $obj) {
        echo '<dt>'.$obj->item_name.'</dt>';
        echo '<dd>商品番号: '.$obj->item_code.'</dd>';
        echo '<dd>&yen;'.number_format($obj->price).'-</dd>';
        echo '<dd>'.date('Y/m/d', $obj->release_date).'発売</dd>';
    }
    echo '</dl>';
}
/**
 * 固定長データを読み込む
 */
$strategy1 = new ReadJsonLengthDataStrategy('./data.json');
$context1 = new ItemDataContext($strategy1);
dumpData($context1->getItemData());
echo '<hr>';

/**
 * タブ区切りデータを読み込む
 */
$strategy2 = new ReadTabSeparatedDataStrategy('./tab_separated_data.txt');
$context2 = new ItemDataContext($strategy2);
dumpData($context2->getItemData());

