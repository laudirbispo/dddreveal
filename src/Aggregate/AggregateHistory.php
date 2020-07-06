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

use laudirbispo\DDDReveal\Events\RecordedEvents;

class AggregateHistory extends RecordedEvents
{
	/**
	 * @var string
	 */
	private $aggregateId;
	
	public function __construct(AggregateIdentifier $AggregateId, array $events)
	{
		
		foreach ($events as $event){
			if ($event->getAggregateId() !==  $AggregateId->get())
				throw new AggregateIsCorruptedException("Eventos corrompidos. Não é possível recuperar seu estado.");
		}
		parent::__construct($events);      // DomainRecordedEvents
		$this->aggregateId = $AggregateId->get();
	}
	
	public function getAggregateId () : string
	{
		return $this->aggregateId;
	}
	
}
