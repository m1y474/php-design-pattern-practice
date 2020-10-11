<?php

require_once './TextDecorator.class.php';

/**
 * TextDecoratorクラスの実装クラス
 */
class DoubleByteText extends TextDecorator
{
    /**
     * テキストを全角文字に変換して返却
     * 半角英字・数字・スペース・カタカナを全角に、濁点付きの文字を1文字に変換
     */
    public function getText()
    {
        $str = parent::getText();
        return mb_convert_kana($str, 'RANSKV');
    }
}
