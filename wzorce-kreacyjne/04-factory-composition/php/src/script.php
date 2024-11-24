<?php

namespace App;

use App\Factory;

$factory = new Factory();
$house = $factory->createBuilding('house');
print(sprintf("Dom z: %s", $house->displayInfo()));
