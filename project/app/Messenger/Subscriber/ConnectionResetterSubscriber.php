<?php

declare(strict_types=1);

namespace App\Messenger\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Messenger\Event\WorkerMessageHandledEvent;
use Symfony\Component\Messenger\Event\WorkerMessageReceivedEvent;

class ConnectionResetterSubscriber implements EventSubscriberInterface
{

	public static function getSubscribedEvents(): array
	{
		return [
			WorkerMessageReceivedEvent::class => ['onWorkerMessageReceivedEvent'],
			WorkerMessageHandledEvent::class => ['onWorkerMessageHandledEvent'],
		];
	}

	public function onWorkerMessageReceivedEvent(WorkerMessageReceivedEvent $event): void
	{
		$this->connect();
	}

	public function onWorkerMessageHandledEvent(): void
	{
		$this->disconnect();
	}

	private function disconnect(): void
	{
	}

	private function connect(): void
	{
		// Because it could have been running long before recieving first message (and already closed)
		$this->disconnect();
	}

}
