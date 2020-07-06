<?php declare(strict_types=1);
namespace laudirbispo\DDDReveal\EventStore;

use laudirbispo\DDDReveal\{
	Events\RecordedEvents,
	Aggregate\AggregateIdentifier
};

interface EventStore 
{
	public function commit(RecordedEvents $event);
	public function getAggregateHistory(AggregateIdentifier $aggregateId);
}