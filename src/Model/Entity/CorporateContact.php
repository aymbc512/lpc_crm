<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CorporateContact Entity
 *
 * @property int $corporate_contact_id
 * @property string|null $name
 * @property string|null $email
 * @property int|null $phone_number
 * @property string|null $corporate_contact_position_kbn
 * @property string|null $corporate_contact_remarks
 * @property int|null $stakeholder_id
 * @property int|null $case_id
 * @property string|null $creator_id
 * @property \Cake\I18n\Date|null $created_at
 * @property string|null $updater_id
 * @property \Cake\I18n\DateTime $updated_at
 *
 * @property \App\Model\Entity\Stakeholder $stakeholder
 * @property \App\Model\Entity\Case $case
 * @property \App\Model\Entity\User $user
 */
class CorporateContact extends Entity
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
        'name' => true,
        'email' => true,
        'phone_number' => true,
        'corporate_contact_position_kbn' => true,
        'corporate_contact_remarks' => true,
        'stakeholder_id' => true,
        'case_id' => true,
        'creator_id' => true,
        'created_at' => true,
        'updater_id' => true,
        'updated_at' => true,
        'stakeholder' => true,
        'case' => true,
        'user' => true,
    ];
}
