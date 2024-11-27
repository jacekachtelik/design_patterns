<?php

use App\Adaptee;
use App\Adapter;

require_once(__DIR__ . '/vendor/autoload.php');

$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);
echo ($adapter->request());
