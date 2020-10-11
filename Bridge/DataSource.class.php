<?php

/**
 * Implementorに相当する
 * このサンプルではインターフェースとして実装
 */
interface DataSouce
{
    public function open();
    public function read();
    public function close();
}
