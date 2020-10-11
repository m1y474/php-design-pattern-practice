<?php

require_once './DisplaySourceFile.class.php';
/**
 * 指定されたファイルの内容を表示するクラス
 */
class ShowFile implements DisplaySourceFile
{
    /**
     * 内容を表示するファイル名
     */
    private $filename;

    /**
     * コンストラクタ
     *
     * @param string ファイル名
     * @throws Exception
     */
    public function __construct($filename)
    {
        if (!is_readable($filename)) {
            throw new Exception('file "' . $filename . '" is not readble !');
        }
        $this->filename = $filename;
    }

    /**
     * プレーンテキストとして表示
     */
    public function showPlain()
    {
        echo '<pre>';
        echo htmlspecialchars(
            file_get_contents($this->filename),
            ENT_QUOTES,
            mb_internal_encoding()
        );
        echo '</pre>';
    }

    /**
     * キーワードをハイライトとして表示する
     */
    public function showHightLight()
    {
        highlight_file($this->filename);
    }

    /**
     * キーワードをハイライトとして表示する
     * DisplaySourceFileインターフェースの実装
     */
    public function display()
    {
        highlight_file($this->filename);
    }
}
