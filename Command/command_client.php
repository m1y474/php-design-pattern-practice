<?php

require_once './Queue.class.php';
require_once './TouchCommand.class.php';
require_once './CompressCommand.class.php';
require_once './CopyCommand.class.php';
require_once './File.class.php';

$queue = new Queue();
$file = new File('./sample.txt');
$queue->addCommand(new TouchCommand($file));
$queue->addCommand(new CompressCommand($file));
$queue->addCommand(new CopyCommand($file));

$queue->run();
