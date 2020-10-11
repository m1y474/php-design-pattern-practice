<?php

require_once './ItemDao.class.php';
require_once './Item.class.php';

class MockItemDao implements ItemDao
{
    public function findById($item_id)
    {
        return new Item($item_id, 'ダミー商品');
    }
}
