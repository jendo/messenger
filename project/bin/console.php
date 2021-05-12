#!/usr/bin/env php
<?php

declare(strict_types=1);

use App\Bootstrap;
use Symfony\Component\Console\Application;

require __DIR__ . '/../vendor/autoload.php';

/** @var \Nette\DI\Container $container */
$configurator = (new Bootstrap())::boot();

$container = $configurator->createContainer();

$console = $container->getByType(Application::class);
$console->add($container->getByType(Symfony\Component\Messenger\Command\ConsumeMessagesCommand::class));

exit($console->run());
