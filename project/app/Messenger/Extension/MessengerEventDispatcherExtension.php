<?php

declare(strict_types=1);

namespace App\Messenger\Extension;

use Nette\DI\CompilerExtension;
use Nette\DI\Definitions\ServiceDefinition;
use Nette\DI\Definitions\Statement;
use RuntimeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MessengerEventDispatcherExtension extends CompilerExtension
{
	private const MESSENGER_EVENT_DISPATCHER_SERVICE_NAME = 'messenger.console.eventDispatcher';
	private const TAG_SUBSCRIBER = 'messenger.eventDispatcher.subscriber';

	public function beforeCompile(): void
	{
		$builder = $this->getContainerBuilder();

		$eventDispatcher = $this->getMessengerEventDispatcherService();

		/** @var string[] $serviceNames */
		$serviceNames = array_keys($builder->findByTag(self::TAG_SUBSCRIBER));

		foreach ($serviceNames as $serviceName) {
			$serviceDefinition = $builder->getDefinition($serviceName);
			$eventDispatcher->addSetup('addSubscriber', [new Statement($serviceDefinition)]);
		}
	}

	private function getMessengerEventDispatcherService(): ServiceDefinition
	{
		$builder = $this->getContainerBuilder();

		$serviceDefinition = $builder->getDefinition(self::MESSENGER_EVENT_DISPATCHER_SERVICE_NAME);

		if ($serviceDefinition instanceof ServiceDefinition) {
			return $serviceDefinition;
		}

		throw new RuntimeException();
	}

}
