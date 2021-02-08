<?php

namespace Main;

ini_set('error_reporting', E_ALL & ~E_NOTICE);

class LuckyTicketsOptimized implements TaskInterface
{
    public function run(string $input): string
    {
        $n = (int) $input;

        // строим N(k) таблицу

        $nkMap = [1 => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]];

        for ($i = 2; $i <= $n; $i++) {
            for ($j = 0; $j <= $i * 9; $j++) {
                for ($k = $j; $k >= max(0, $j - 9); $k--) {
                    $nkMap[$i][$j] += $nkMap[$i - 1][$k];
                }
            }
        }

        // возводим в степень каждый элемент нужного значения и суммируем

        $result = array_sum(
            array_map(
                function ($el) {
                    return pow($el, 2);
                },
                $nkMap[$n]
            )
        );

        return (string) $result;
    }
}