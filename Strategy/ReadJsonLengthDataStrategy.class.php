<?php

require_once('./ReadItemDataStrategy.class.php');

/**
 * JSONデータを読み込む
 * ConcreteStrategyに相当する
 */
class ReadJsonLengthDataStrategy extends ReadItemDataStrategy
{
    /**
     * データファイルを読み込みオブジェクトの配列で返す
     * @param string $filename データファイル名
     * @return array<stdClass> データオブジェクトの配列
     */
    protected function readData($filename)
    {
        $data = json_decode(file_get_contents($filename));

        $values = [];
        foreach ($data as $line) {
            /**
             * 戻り値オブジェクトの作成
             */
            $obj = new stdClass();
            $obj->item_name = $line->item_name;
            $obj->item_id = $line->item_id;
            $obj->price = $line->price;
            $obj->release_date = new \DateTime($line->release_date);
            $values[] = $obj;
        }
        return $values;
    }
}
