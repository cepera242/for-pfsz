<?php

namespace Test\Engine\Interactor;

const EROR = "Для выхода нажмите ctrl + C";

use function cli\prompt;
use function cli\line;

use const Test\Engine\Calculator\COMMUNICATION;

function inputNumber(): array
{
    line("Я умею строить короткий путь из двух точек");
    do {
        //повтор запроса если не попали в диапозон цифр 1-6(COMMUNICATION)
        $start = (int) prompt("Задайте первую точку (от 1 до 6)");
        if (!array_key_exists($start, COMMUNICATION)) {
            line("К сожалению нет такой точки, попробуйте еще раз");
            line(EROR);
        }
    } while (!array_key_exists($start, COMMUNICATION));
    do {
        $finish = (int) prompt("Задайте вторую точку (от 1 до 6)");
        if (!array_key_exists($finish, COMMUNICATION)) {
            line("К сожалению нет такой точки, попробуйте еще раз");
            line(EROR);
        }
    } while (!array_key_exists($finish, COMMUNICATION));
    return ["start" => $start, "finish" => $finish];
}

function getStepWord(int $count): string
{
    //форматирование склонения
    if ($count === 1) {
        return "шаг";
    } else {
        return "шага";
    }
}

function output(int $start, int $finish, array $step): string
{
    //точки равны
    if ($start === $finish) {
        return "Вы стоите на месте: стартовая и конечная точка равны.\n";
    }
    if (!empty($step)) {
        $stepCount = count($step) - 1;
        $stepWord = getStepWord($stepCount);
        return
            "Кратчайший путь от точки {$start} до точки {$finish}: {$stepCount} {$stepWord}.\n" .
            "Вот подробный путь: " . implode(" -> ", $step) . "\n";
    } else {
        return "Путь от {$start} до {$finish} не найден.\n";//на случай исправления логики
    }
}
