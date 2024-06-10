<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdvisorConsultation Entity
 *
 * @property int $advisor_consultations_id
 * @property string|null $consultation_name
 * @property \Cake\I18n\Date|null $consultation_at
 * @property string|null $consultation_content
 * @property int|null $customer_id
 * @property string|null $lawyer_id
 * @property int|null $advisor_contract_id
 * @property string|null $paralegal_id
 * @property string|null $creator_id
 * @property \Cake\I18n\Date|null $created_at
 * @property string|null $updater_id
 * @property \Cake\I18n\DateTime $updated_at
 *
 * @property \App\Model\Entity\Stakeholder $stakeholder
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AdvisorContract $advisor_contract
 * @property \App\Model\Entity\Case[] $cases
 */
class AdvisorConsultation extends Entity
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
        'consultation_name' => true,
        'consultation_at' => true,
        'consultation_content' => true,
        'customer_id' => true,
        'lawyer_id' => true,
        'advisor_contract_id' => true,
        'paralegal_id' => true,
        'creator_id' => true,
        'created_at' => true,
        'updater_id' => true,
        'updated_at' => true,
        'stakeholder' => true,
        'user' => true,
        'advisor_contract' => true,
        'cases' => true,
    ];
}
