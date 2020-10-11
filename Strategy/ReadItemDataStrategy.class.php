<?php
/**
 * Strategyに相当する
 */
abstract class ReadItemDataStrategy
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * データファイルを読み込みオブジェクトの配列で返す
     * Contextに提供するメソッド
     * @param string データファイル名
     * @return array データオブジェクトの配列
     */
    public function getData()
    {
        if (!is_readable($this->getFilename())) {
            throw new Exception('file ['.$this->getFilename().' is not readable !');
        }
        return $this->readData($this->getFilename());
    }

    /**
     * ファイル名を返す
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * ConcreteStrategyクラスに実装させるメソッド
     * @param string $filename データファイル名
     * @return array データオブジェクトの配列
     */
    protected abstract function readData($filename);
}
