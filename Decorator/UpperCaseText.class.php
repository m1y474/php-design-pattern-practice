<?php
require_once './TextDecorator.class.php';

/**
 * TextDecoratorクラスの実装クラス
 */
class UpperCaseText extends TextDecorator
{
    /**
     * 半角小文字を半角大文字に変換して返却
     */
    public function getText()
    {
        $str = parent::getText();
        return mb_strtoupper($str);
    }
}
