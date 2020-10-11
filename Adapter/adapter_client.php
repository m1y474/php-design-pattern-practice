<?php

require_once './DisplaySourceFileImpl.class.php';

/**
 * DisplaySourceFileImplクラスをインスタンス化する
 * 内容を表示するファイルは「ShowFile.class.php」
 */
$show_file = new DisplaySourceFileImpl('./ShowFile.class.php');

/**
 * プレーンテキストとハイライトしたファイル内容をそれそれ表示する
 */
$show_file->display();
