<?php declare(strict_types=1);
namespace laudirbispo\DDDReveal\Events;

interface EventListener 
{
	public function execute(DomainEvent $event);
}
