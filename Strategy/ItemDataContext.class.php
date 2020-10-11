<?php

/**
 * Contextに相当する
 */
class ItemDataContext
{
    /** @var ReadItemDataStrategy */
    private $strategy;

    /**
     * コンストラクタ
     *
     * @param ReadItemDataStrategy $strategy
     */
    public function __construct(ReadItemDataStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * 商品情報をオブジェクトの配列で返す
     *
     * @return array
     */
    public function getItemData(): array
    {
        return $this->strategy->getData();
    }
}
