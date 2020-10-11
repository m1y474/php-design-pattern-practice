<?php

require_once './ItemDao.class.php';
require_once './Item.class.php';

class DbItemDao implements ItemDao
{
    private $items;
    public function __construct()
    {
        $fp = fopen('./item_data.txt', 'r');

        /**
         * ヘッダ行を抜く
         */
        $dummy = fgets($fp, 4096);

        $this->items = [];
        while ($buffer = fgets($fp, 4096)) {
            $item_id = trim(substr($buffer, 0, 10));
            $item_name = trim(substr($buffer, 10));

            $item = new Item($item_id, $item_name);
            $this->items[$item->getId()] = $item;
        }
        fclose($fp);
    }

    public function findbyId($item_id)
    {
        if (array_key_exists($item_id, $this->items)) {
            return $this->items[$item_id];
        }
        return null;
    }
}
