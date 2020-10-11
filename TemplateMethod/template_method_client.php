<?php

require_once './ListDisplay.class.php';
require_once './TableDisplay.class.php';

$data = [
    'Design Pattern',
    'Gang of Four',
    'Template Method Sample 1',
    'Template Method Sample 2'
];

$display1 = new ListDisplay($data);
$display2 = new TableDisplay($data);

$display1->display();
echo '<hr>';
$display2->display();
