<?php

require_once('./ReadItemDataStrategy.class.php');
/**
 * タブ区切りデータを読み込む
 * ConcreteStrategyに相当する
 */
class ReadTabSeparatedDataStrategy extends ReadItemDataStrategy
{
    /**
     * データファイルを読み込みオブジェクトの配列で返す
     * @param string $filename データファイル名
     * @return array<stdClass> データオブジェクトの配列
     */
    protected function readData($filename)
    {
        $fp = fopen($filename, 'r');
        /**
         * ヘッダ行を抜く
         */
        $dummy = fgets($fp, 4096);
        /**
         * データの読み込み
         */
        $values = [];
        while ($buffer = fgets($fp, 4096)) {
            list($item_code, $item_name, $price, $release_date) = explode('\t', trim($buffer));
            /**
             * 戻り値オブジェクトの作成
             */
            $obj = new stdClass();
            $obj->item_name = $item_name;
            $obj->item_code = $item_code;
            $obj->price = $price;
            list($year, $month, $day) = explode('/', $release_date);
            $obj->release_date = mktime(
                0,
                0,
                0,
                $month,
                $day,
                $year
            );
            $values[] = $obj;
        }
        fclose($fp);
        return $values;
    }
}
