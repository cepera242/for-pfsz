<?php

namespace Test\Engine;

use const Test\Engine\Data\DIRECTORY;

use function Test\Engine\Calculator\calculateStep;
use function Test\Engine\Interactor\inputNumber;
use function Test\Engine\Interactor\output;

function start()
{
    if (!file_exists(DIRECTORY)) {
        mkdir(DIRECTORY, 0777, true);
    }
    $number = inputNumber();
    $start = $number["start"];
    $finish = $number["finish"];
    $step = calculateStep($start, $finish);
    $result = output($start, $finish, $step);
    Data\log("Путь от {$start} до {$finish}: " . $result);
    print_r($result);
}
