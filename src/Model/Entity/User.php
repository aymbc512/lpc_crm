<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property string $user_id
 * @property string|null $password
 * @property string|null $user_name
 * @property string|null $role_kbn
 * @property string|null $department_kbn
 * @property string|null $expertise_kbn
 * @property string|null $phone_number
 * @property string|null $email
 * @property int|null $lawyer_no
 * @property string|null $creator_id
 * @property \Cake\I18n\Date|null $created_at
 * @property string|null $updater_id
 * @property \Cake\I18n\DateTime $updated_at
 *
 * @property \App\Model\Entity\User $user
 */
class User extends Entity
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
        'password' => true,
        'user_name' => true,
        'role_kbn' => true,
        'department_kbn' => true,
        'expertise_kbn' => true,
        'phone_number' => true,
        'email' => true,
        'lawyer_no' => true,
        'creator_id' => true,
        'created_at' => true,
        'updater_id' => true,
        'updated_at' => true,
        'user' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];
}
