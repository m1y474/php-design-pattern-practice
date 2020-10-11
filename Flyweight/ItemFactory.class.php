<?php

require_once './Item.class.php';

/**
 * FlyweightFactoryクラスに相当する
 * Singletonパターンにもなっている
 *
 * このサンプルではUnsharedConcreteFlyweightオブジェクトを返すメソッドは良いされていない
 */
class ItemFactory
{
    private $pool;
    private static $instance = null;
    /**
     * このサンプルではインスタンス生成時に保持するオブジェクトを全て生成している
     */
    private function __construct($filename)
    {
        $this->buildPool($filename);
    }

    /**
     * Factoryのインスタンスを返す
     * @return ItemFactory
     */
    public static function getInstance($filename)
    {
        if (is_null(self::$instance)) {
            self::$instance = new ItemFactory($filename);
        }
        return self::$instance;
    }

    /**
     * ConcreteFlyweightを返す
     * @return Item|null
     */
    public function getItem($code)
    {
        if (array_key_exists($code, $this->pool)) {
            return $this->pool[$code];
        }
        return null;
    }

    /**
     * データを読み込み、プールを初期化する
     * @return void
     */
    private function buildPool($filename)
    {
        $this->pool = [];
        $fp = fopen($filename, 'r');
        while ($buffer = fgets($fp, 4096)) {
            list($item_code, $item_name, $price) = explode('\t', $buffer);
            $this->pool[$item_code] = new Item($item_code, $item_name, $price);
        }
        fclose($fp);
    }

    /**
     * このインスタンスの複製を許可しないようにする
     * @throws RuntimeException
     */
    public final function __clone()
    {
        throw new RuntimeException('Clone is not allowed against' . get_class($this));
    }
}
