<?php

declare(strict_types=1);

namespace App\Messenger\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Messenger\Event\WorkerStoppedEvent;

class WorkerShutdownSubscriber implements EventSubscriberInterface
{

	public static function getSubscribedEvents(): array
	{
		return [
			WorkerStoppedEvent::class => ['onWorkerStoppedEvent'],
		];
	}

	public function onWorkerStoppedEvent(): void
	{
		// Flush batched products to index etc.
	}

}
