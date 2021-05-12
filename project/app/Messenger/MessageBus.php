<?php

declare(strict_types=1);

namespace App\Messenger;

use Symfony\Component\Messenger\MessageBusInterface;

final class MessageBus
{
	private MessageBusInterface $bus;

	public function __construct(MessageBusInterface $bus)
	{
		$this->bus = $bus;
	}

	public function dispatch($message): void
	{
		$this->bus->dispatch($message);
	}
}
