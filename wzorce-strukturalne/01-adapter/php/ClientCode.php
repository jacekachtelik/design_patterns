<?php

use App\Adaptee;
use App\Adapter;
use App\ConcreteTarget;

require_once(__DIR__ . '/vendor/autoload.php');

/**
 * Przykładowe wywołanie standardowej klasy
 */
$concreteTarget = new ConcreteTarget();
$result = $concreteTarget->request();
echo "Concrete target result: {$result}\n";

/**
 * Wywołanie klasy adaptowanej przez adapter
 */
$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);
$result = $adapter->request();
echo sprintf("Adaptee via adapter result: %s \n", $result);
