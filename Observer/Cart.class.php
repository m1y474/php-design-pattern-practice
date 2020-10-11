<?php

/**
 * Subjectクラス＋ConcreteSubjectクラスに相当する
 */
class Cart
{
    private $items;
    private $listeners;

    public function __construct()
    {
        $this->items = [];
        $this->listeners = [];
    }

    public function addItem(string $item_cd)
    {
        $this->items[$item_cd] = (isset($this->items[$item_cd]) ? ++$this->items[$item_cd] : 1);
    }

    public function removeItem(string $item_cd)
    {
        $this->items[$item_cd] = (isset($this->items[$item_cd]) ? --$this->items[$item_cd] : 0);
        if ($this->items[$item_cd] <= 0) {
            unset($this->items[$item_cd]);
        }
        $this->notify();
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function hasItem(string $item_cd): bool
    {
        return array_key_exists($item_cd, $this->items);
    }

    /**
     * Observerを登録するメソッド
     */
    public function addListener(CartListener $listener)
    {
        $this->listeners[get_class($listener)] = $listener;
    }

    /**
     * Observer を削除するメソッド
     */
    public function removeListener(CartListener $listener)
    {
        unset($this->listeners[get_class($listener)]);
    }

    /**
     * Observerへ通知するメソッド
     */
    public function notify()
    {
        foreach ($this->listeners as $listener) {
            $listener->update($this);
        }
    }
}
