<?php

namespace Main;

use PHPUnit\Framework\Assert;

class Tester {
    private string $path;

    private TaskInterface $task;

    public function __construct(string $path, TaskInterface $task)
    {
        $this->path = $path;
        $this->task = $task;
    }

    public function runTests($name = null)
    {
        $nr = 0;

        if (!$name) {
            $name = get_class($this->task);
        }

        echo '================================================'.PHP_EOL;
        echo sprintf('RUNNING SUITE: %s', $name).PHP_EOL;
        echo '================================================'.PHP_EOL;

        while (true) {
            $inFile = sprintf('%s/test.%s.in', $this->path, $nr);
            $outFile = sprintf('%s/test.%s.out', $this->path, $nr);

            if (!file_exists($inFile) || !file_exists($outFile)) {
                break;
            }

            $in = trim(file_get_contents($inFile));

            echo sprintf('CASE %d: ', $nr);

            $started = microtime(true);
            $actualOut = $this->task->run($in);
            $expectedOut = trim(file_get_contents($outFile));

            echo sprintf('%s (%.3f sec.)', $expectedOut == $actualOut ? 'OK' : 'FAIL', microtime(true) - $started) . PHP_EOL;

            $nr++;
        }
    }
}