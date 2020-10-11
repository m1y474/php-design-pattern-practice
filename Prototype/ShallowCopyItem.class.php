<?php

require_once './ShallowCopyItem.class.php';

/**
 * ConcretePrototypeクラスに相当する
 */
class ShallowCopyItem extends ItemPrototype
{
    /**
     * 浅いコピーを行うので空の実装を行う
     */
    protected function __clone()
    {
    }
}
