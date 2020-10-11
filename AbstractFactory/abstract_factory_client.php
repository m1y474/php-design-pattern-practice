<?php

if (isset($_POST['factory'])) {
    $factory = $_POST['factory'];
    // var_dump($factory);exit;
    switch ($factory) {
        case 1:
            include_once './DbFactory.class.php';
            $facotry = new DbFactory();
            break;
        case 2:
            include_once './MockFactory.class.php';
            $facotry = new MockFactory();
        default:
            throw new RuntimeException('invalid factory');
            break;
    }
    $item_id = 1;
    $item_dao = $facotry->createItemDao();
    $item = $item_dao->findbyId($item_id);
    echo 'ID=' . $item_id . 'の商品は「' . $item->getName() . '」です<br>';

    $order_id = 3;
    $order_dao = $facotry->createOrderDao();
    $order = $order_dao->findById($order_id);
    echo 'ID=' . $order_id . 'の注文情報は次のとおりです。';
    foreach ($order->getItems() as $item) {
        echo '<li>' . $item['object']->getName();
    }
    echo '</li>';
}
?>
<hr>
<form action="" method="post">
    <div>DaoFactoryの種類：
        <input type="radio" name="factory" value="1">DbFactory
        <input type="radio" name="factory" value="2">MockFactory
    </div>
    <div>
        <input type="submit">
    </div>
</form>
