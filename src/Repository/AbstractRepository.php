<?php declare(strict_types=1);
namespace laudirbispo\DDDReveal\Repository;

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

use laudirbispo\DDDReveal\{
    Aggregate\AggregateRoot, 
    Aggregate\AggregateIdentifier,
    EventStore\EventStore
};

class AbstractRepository implements Repository
{
    private $eventStore;
    
    private $projection;
    
    public function __construct(EventStore $EventStore, Projectable $Projection)
    {
        $this->projection = $Projection;
        $this->eventStore = $EventStore;
    }
    
    public function get(AggregateIdentifier $aggregateId)
    {
        return $this->eventStore->getAggregateHistory($aggregateId);
    }
    
    public function save(AggregateRoot $Aggregate)
    {
        $events = $Aggregate->getRecordedEvents();
        $this->projection->project($events);
        $this->eventStore->commit($events);
    }
    
}
