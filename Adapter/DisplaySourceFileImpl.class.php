<?php
require_once './DisplaySourceFile.class.php';
require_once './ShowFile.class.php';

/**
 * @link http://shimooka.hateblo.jp/entry/20141212/1418364494
 *
 * DisplaySourceFileを実装したクラス
 */
class DisplaySourceFileImpl extends ShowFile implements DisplaySourceFile
{
    /**
     * コンストラクタ
     */
    public function __construct($filename)
    {
        parent::__construct($filename);
    }

    /**
     * 指定されたソースファイルをハイライト表示する
     */
    public function display()
    {
        parent::showHightLight();
    }
}
