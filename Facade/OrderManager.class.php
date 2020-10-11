<?php

/**
 * @link http://shimooka.hateblo.jp/entry/20141215/1418620292
 * Facadeクラスに相当するOrderManagerクラス
 */
require_once './Order.class.php';
require_once './ItemDao.class.php';
require_once './OrderDao.class.php';

class OrderManager
{
    /**
     * 具体的な注文処理を隠蔽する役割
     *
     * @param Order $order
     */
    public static function order(Order $order)
    {
        $item_dao = ItemDao::getInstance();
        foreach ($order->getItems() as $order_item) {
            $item_dao->setAside($order_item);// 引当処理
        }
        OrderDao::createOrder($order); // 注文を表示
    }
}
