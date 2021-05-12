<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Messenger\Message\SmsNotification;
use App\Messenger\MessageBus;
use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

	private MessageBus $bus;

	public function __construct(MessageBus $bus)
	{
		parent::__construct();
		$this->bus = $bus;
	}

	public function actionDefault(): void
	{
		$this->bus->dispatch(new SmsNotification('Look! I created a message!'));
	}

}
