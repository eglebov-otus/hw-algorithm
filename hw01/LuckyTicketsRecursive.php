<?php

namespace Main;

class LuckyTicketsRecursive implements TaskInterface
{
    private int $qty = 0;

    private int $n = 0;

    public function run(string $input): string
    {
        $this->qty = 0;
        $this->n = 2 * (int) $input;
        $this->nextDigit(0, 0, 0);

        return $this->qty;
    }

    private function nextDigit(int $nr, int $s1, int $s2)
    {
        echo sprintf("%d - %d - %d", $nr, $s1, $s2) . PHP_EOL;

        if ($nr == $this->n) {
            if ($s1 == $s2) {
                $this->qty++;
            }

            return;
		}

        for ($a = 0; $a <= 9; $a++) {
            if ($nr < $this->n / 2) {
                $this->nextDigit($nr + 1, $s1 + $a, $s2);
            } else {
                $this->nextDigit($nr + 1, $s1, $s2 + $a);
            }
        }
    }
}