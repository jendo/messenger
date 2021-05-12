<?php
declare(strict_types=1);

namespace App\Messenger\MessageHandler;

use App\Messenger\Message\SmsNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SmsNotificationHandler implements MessageHandlerInterface
{
	public function __invoke(SmsNotification $message)
	{
		var_dump($message->getContent());
	}
}
