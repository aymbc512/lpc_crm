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
}
