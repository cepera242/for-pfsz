<?php

namespace Test\Engine\Calculator;

const COMMUNICATION = [
    1 => [2],
    2 => [1, 3, 4, 6],
    3 => [2, 4, 5],
    4 => [2, 3, 5, 6],
    5 => [3, 4, 6],
    6 => [2, 4, 5]
];

function calculateStep(int $start, int $finish): array
{
    $order[] = $start;
    $visited[$start] = true;
    $tree[$start] = null;
    while (!empty($order)) {
        $current = array_shift($order);
        if (!isset(COMMUNICATION[$current])) {
            continue;
        }
        if ($current === $finish) {
            $step = [];
            while ($current !== null) {
                array_unshift($step, $current);
                $current = $tree[$current];
            }
            return $step;
        }
        foreach (COMMUNICATION[$current] as $neighbor) {
            if (!isset($visited[$neighbor])) {
                $order[] = $neighbor;
                $visited[$neighbor] = true;
                $tree[$neighbor] = $current;
            }
        }
    }
    return [];
}
