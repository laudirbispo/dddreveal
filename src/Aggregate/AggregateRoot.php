<?php declare(strict_types=1);
namespace laudirbispo\DDDReveal\Aggregate;

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
use laudirbispo\DDDReveal\Events\{DomainEvent, RecordedEvents};
	
class AggregateRoot
{
	protected $id;

	protected $events = [];

	public function getId() 
	{
		return $this->id;
	}
	
	public function getRecordedEvents(string $event = '') : RecordedEvents
	{
		if (empty($event))
			return new RecordedEvents($this->events);
		
		return (isset($this->events[$event])) 
			? new RecordedEvents($this->events[$event]) 
		    : new RecordedEvents([]);
	}
	
	public function clearRecordedEvents(string $eventName = '') : bool 
	{
		if (empty($eventName)) {
			$this->events = [];
			return true;
		} else {
			if (isset($this->events[$eventName])) {
				unset($this->events[$eventName]);
				return true;
			}
			return false;	
		}
			
	}
	
	protected function recordThat(DomainEvent $Event) : void
	{
		$this->events[$Event->getEventName()][] = $Event;
	}
	
	protected function apply(DomainEvent $DomainEvent) : void
    {
        $method = 'apply' . ClassName::short($DomainEvent);
		if (!method_exists($this, $method))
			throw new \Exception(
				sprintf('The method "%s" does not exists in the model "%s"', $method, ClassName::short($this))
			);
        $this->$method($DomainEvent);
    }   
	
	protected function applyAndRecordThat(DomainEvent $DomainEvent) : void
    {
        $this->recordThat($DomainEvent);
        $this->apply($DomainEvent);
    }
	
}