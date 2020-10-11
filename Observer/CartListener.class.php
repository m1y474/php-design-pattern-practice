<?php

/**
 * Observerクラスに相当する
 */
interface CartListener
{
    public function update(Cart $cart);
}
