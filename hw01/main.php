<?php

require __DIR__ . '/vendor/autoload.php';

use Main\{Tester, Strings, LuckyTicketsOptimized};

$tester = new Tester(__DIR__.'/testdata/0.String', new Strings());
$tester->runTests();

$tester = new Tester(__DIR__.'/testdata/1.Tickets', new LuckyTicketsOptimized());
$tester->runTests();