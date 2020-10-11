<?php require_once './ReaderFactory.class.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作曲家と作品たち</title>
</head>
<body>
    <?php
    /**
     * 外部からの入力ファイル
     */
    $filename = './Music.xml';

    $factory = new ReaderFactory();
    $data = $factory->create($filename);
    $data->read();
    $data->display();?>
</body>
</html>
