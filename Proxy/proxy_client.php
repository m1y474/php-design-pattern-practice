<?php

if (isset($_POST['dao'], $_POST['proxy'])) {
    $dao = $_POST['dao'];
    switch ($dao) {
        case 1:
            include_once('./MockItemDao.class.php');
            $dao = new MockItemDao();
            break;

        default:
            include_once('./DbItemDao.class.php');
            $dao = new DbItemDao();
            break;
    }
    $proxy = $_POST['proxy'];
    switch ($proxy) {
        case 1:
            include_once('./ItemDaoProxy.class.php');
            $dao = new ItemDaoProxy($dao);
            break;
    }
    for ($item_id = 1; $item_id <= 3; $item_id++) {
        $item = $dao->findById($item_id);
        echo 'ID=' . $item_id . 'の商品は「' . $item->getName() . '」です<br>';
    }
}
?>
<hr>
<form action="" method="post">
    <div>
        Daoの種類:
        <input type="radio" name="dao" value="0">DbItemDao
        <input type="radio" name="dao" value="1">MockItemDao
    </div>
    <div>
        Proxyの利用:
        <input type="radio" name="proxy" value="0" checked>しない
        <input type="radio" name="proxy" value="1">する
    </div>
    <div>
        <input type="submit">
    </div>
</form>
