<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection(range(1, 10));

echo 'Contains 10: ' . ($numbers->contains(10) ? 'yes' : 'no') . PHP_EOL;

$smallNumbers = $numbers->filter(fn ($number) => $number <= 5);

echo 'Numbers <= 5: ';
var_export($smallNumbers->values()->all());
echo PHP_EOL;
