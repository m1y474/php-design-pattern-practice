<?php

require_once './Listing.class.php';

/**
 * Listingクラスで提供されている機能を拡張する
 * RefinedAbstractionに相当する
 */
class ExtendedListing extends Listing
{
    /**
     * コンストラクタ
     * @param $souce_name ファイル名
     */
    public function __construct($data_souce)
    {
        parent::__construct($data_souce);
    }

    /**
     * データを読み込み際、データの中の特殊文字を変換する
     * @return 変換されたデータ
     */
    public function readWithEncode()
    {
        return htmlspecialchars($this->read(), ENT_QUOTES, mb_internal_encoding());
    }
}
