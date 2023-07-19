<?php

use Psr\Log\LoggerInterface;
use Vozimsan\Core\Application\Logger\FileLogger;
use function DI\autowire;

return [
    LoggerInterface::class => autowire(FileLogger::class),
];