<?php

require_once './Data.class.php';
require_once './DataCaretaker.class.php';

session_start();

$caretaker = new DataCaretaker();
$data = isset($_SESSION['data']) ? $_SESSION['data'] : new Data();

$mode = (isset($_POST['mode']) ? $_POST['mode'] : '');
switch ($mode) {
    case 'add':
        /**
         * コメントをDataオブジェクトに登録する
         * 現時点のコメントはセッションに保存していることに注意
         */
        $data->addComment((isset($_POST['comment']) ? $_POST['comment'] : ''));
        break;
    case 'save':
        /**
         * データのスナップショットを取りDataCaretakerに依頼して保存する
         */
        $caretaker->setSnapshot($data->takeSnapshot());
        echo '<font color="#dd0000">データを保存しました</font><br>';
        break;
    case 'restore':
        /**
         * DataCaretakerに依頼して保存したスナップショットを取得しデータを復元する
         */
        $data->restoreSnapshot($caretaker->getSnapshot());
        echo '<font color="#00aa00">データを復元しました</font><br>';
        break;
    case 'clear':
        $data = new Data();
}

/**
 * 登録したコメントを表示する
 */

echo '今までのコメント';
if (!is_null($data)) {
    echo '<ol>';
    foreach ($data->getComment() as $comment) {
        echo '<li>' . htmlspecialchars($comment, ENT_QUOTES, mb_internal_encoding()) . '</li>';
    }
    echo '</ol>';
}
/**
 * 次のアクセスで使うデータをセッションに保存
 */
$_SESSION['data'] = $data;
?>
<form action="" method="post">
    コメント: <input type="text" name="comment"><br>
    <input type="submit" value="add" name="mode">
    <input type="submit" value="save" name="mode">
    <input type="submit" value="restore" name="mode">
    <input type="submit" value="clear" name="mode">
</form>
