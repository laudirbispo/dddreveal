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

class AbstractEvent implements DomainEvent
{
    /** Who triggered the process **/
    protected ?string $executedBy = null;
    
    protected string $aggregateId;
    
    protected string $eventDescription = 'Without description';
    
    /** -------- Implementation of DomainEvent Interface --------*/
    public function getAggregateId() : string 
    {
        return $this->aggregateId;
    }
    
    public function getEventName() : string 
    {
        $class = get_called_class();
        return ClassName::short($class);
    }
    
    public function getEventDescription() : string 
    {
        return $this->eventDescription;
    }
    
    public function occurredOn() : int
    {
        return DateTimeImmutable::getTimestamp();
    }
    
    public function getExecutedBy() : ?string 
    {
        return $this->executedBy;
    }
    
}
