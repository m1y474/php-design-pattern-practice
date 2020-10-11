<?php

require_once './DataSource.class.php';

/**
 * 「何をするのか」「どうやって実現するのか」を結ぶ「橋」となっている
 */
class Listing
{
    private $data_source;

    /**
     * コンストラクタ
     * @param $source_name ファイル名
     */
    public function __construct($data_source)
    {
        $this->data_source = $data_source;
    }

    /**
     * データソースを開く
     */
    public function open()
    {
        $this->data_source->open();
    }

    /**
     * データソースからデータを取得する
     * @return array データの配列
     */
    public function read()
    {
        return $this->data_source->read();
    }

    public function close()
    {
        $this->data_source->close();
    }
}
