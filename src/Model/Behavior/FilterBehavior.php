<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Query;

class FilterBehavior extends Behavior
{
    /**
     * Apply filters to a query
     *
     * @param \Cake\ORM\Query $query The query to modify
     * @param array $filters The filters to apply
     * @return \Cake\ORM\Query The modified query
     */
    public function applyFilters(Query $query, array $filters)
    {
        foreach ($filters as $field => $value) {
            if (!empty($value)) {
                $query->where([$field => $value]);
            }
        }
        return $query;
    }

    /**
     * Before find callback
     *
     * @param \Cake\Event\EventInterface $event The beforeFind event
     * @param \Cake\ORM\Query $query The query to modify
     * @param \ArrayObject $options The options for the query
     * @param bool $primary Whether this is the primary query being executed
     * @return \Cake\ORM\Query The modified query
     */
    public function beforeFind(\Cake\Event\EventInterface $event, Query $query, \ArrayObject $options, bool $primary)
    {
        if (isset($this->_config['fields'])) {
            $this->applyFilters($query, $this->_config['fields']);
        }
        return $query;
    }
}
