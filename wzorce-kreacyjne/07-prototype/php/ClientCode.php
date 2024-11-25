<?php

use App\ConcretePrototype;

require_once __DIR__ . '/vendor/autoload.php';

$prototype = new ConcretePrototype('Value 1');
$clone = $prototype->clone();
$clone->setProperty('Cloned value 1');

echo "Original: " . $prototype->getProperty() . "\n";
echo "Clone: " . $clone->getProperty() . "\n";
