<?php

namespace Test\Engine\Data;

const DIRECTORY = "data";
const FILENAME = "log.txt";

function log(string $message): void
{
    $logFilePath = DIRECTORY . "/" . FILENAME;
    $timestamp = date('Y-m-d H:i:s');//временной штамп для отслеживания внесенных данных
    file_put_contents($logFilePath, "[{$timestamp}] {$message}" . PHP_EOL, FILE_APPEND);
}

function checkAndCreateFile(): void
{
    //проверка директории и файла
    if (!file_exists(DIRECTORY)) {
        mkdir(DIRECTORY, 0777, true);
    }
    $logFilePath = DIRECTORY . "/" . FILENAME;
    if (!file_exists($logFilePath)) {
        file_put_contents($logFilePath, "");
    }
}
