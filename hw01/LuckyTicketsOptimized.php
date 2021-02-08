<?php

namespace Main;

ini_set('error_reporting', E_ALL & ~E_NOTICE);

class LuckyTicketsOptimized implements TaskInterface
{
    public function run(string $input): string
    {
        // строим N(k) таблицу

        $nkMap = [1 => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]];

        for ($n = 2; $n <= (int) $input; $n++) {
            for ($k = 0; $k <= $n * 9; $k++) {
                for ($l = $k; $l >= max(0, $k - 9); $l--) {
                    $nkMap[$n][$k] += $nkMap[$n - 1][$l];
                }
            }
        }

        // возводим в степень каждый элемент нужного значения и суммируем

        $result = array_sum(
            array_map(fn($el) => pow($el, 2), $nkMap[(int) $input])
        );

        return (string) $result;
    }
}