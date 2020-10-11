<?php

require_once './Text.class.php';
/**
 * Textクラスを修飾するDecorator
 */
abstract class TextDecorator implements Text
{
    /**
     * Text型の変数
     */
    private $text;

    /**
     * インスタンスの生成
     */
    public function __construct(Text $target)
    {
        $this->text = $target;
    }

    /**
     * インスタンスが保持する文字列を返却
     */
    public function getText()
    {
        return $this->text->getText();
    }

    /**
     * インスタンスに文字列をセット
     */
    public function setText($str)
    {
        $this->text->setText($str);
    }
}
