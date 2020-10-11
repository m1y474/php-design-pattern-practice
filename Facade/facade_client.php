<?php

require_once './Order.class.php';
require_once './OrderItem.class.php';
require_once './ItemDao.class.php';
require_once './OrderManager.class.php';

$order = new Order();
$item_dao = ItemDao::getInstance();

$order->addItem(new OrderItem($item_dao->findbyId(1), 2));
$order->addItem(new OrderItem($item_dao->findbyId(2), 1));
$order->addItem(new OrderItem($item_dao->findbyId(3), 3));

/**
 * 注文処理
 */
OrderManager::order($order);
