<?php

require_once __DIR__.'/vendor/autoload.php';

use Sapiet\Profiler\Profiler;

$number = 50000000;

Profiler::start('test-1');
foreach (range(1, $number) as $value) {
    // echo $value;
}
$test1 = Profiler::end('test-1');

Profiler::start('test-2');
function xrange($min, $max) {
    for ($i = $min; $i < $max; $i++) yield $i;
}

foreach (xrange(1, $number) as $value) {
    // echo $value;
}
$test2 = Profiler::end('test-2');

echo $test1->format();
echo PHP_EOL;
echo $test2->format();
