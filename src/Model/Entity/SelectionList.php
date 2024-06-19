<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SelectionList Entity
 *
 * @property int $id
 * @property int|null $data_id
 * @property int $detail_id
 * @property string $name
 */
class SelectionList extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'data_id' => true,
        'detail_id' => true,
        'name' => true,
    ];
}
