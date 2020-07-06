<?php declare(strict_types=1);
namespace laudirbispo\DDDReveal\Events;

/**
 * Copyright (c) Laudir Bispo  (laudirbispo@outlook.com)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     (c) Laudir Bispo  (laudirbispo@outlook.com)
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 *
 * @package laudirbispo\DDDReveal - This file is part of the Uploader package. 
 */

use laudirbispo\classname\ClassName;

class RecordedEvents
{
	private array $recordedEvents = [];
		
	public function __construct(array $recordedEvents)
	{
		$this->validateEvent($recordedEvents);
		$this->recordedEvents = $recordedEvents;
	}
	
	public function getEvents(string $event_name = '') : array 
	{
		if (empty($event_name))
			return $this->recordedEvents; 
		else 
			return $this->recordedEvents[$event_name];
	}
	
	private function validateEvent(array $recordedEvents)
	{
		foreach ($recordedEvents as $key => $event) {	
			if (is_array($event))
				$this->validateEvent($event);
			else	
				if (!($event instanceof DomainEvent))
					throw new InvalidEventException(
						sprintf("%s é um evento inválido.", ClassName::short($event))
					);
		}
		
	}
}