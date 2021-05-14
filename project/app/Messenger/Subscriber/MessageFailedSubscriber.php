<?php

declare(strict_types=1);

namespace App\Messenger\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Messenger\Event\WorkerMessageFailedEvent;

class MessageFailedSubscriber implements EventSubscriberInterface
{

	public static function getSubscribedEvents(): array
	{
		return [
			WorkerMessageFailedEvent::class => ['onWorkerMessageFailedEvent']
		];
	}

	public function onWorkerMessageFailedEvent(): void
	{
		// handle error
		// Log
		// Send to Sentry
	}

}
