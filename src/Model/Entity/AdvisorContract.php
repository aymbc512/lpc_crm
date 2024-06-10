<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdvisorContract Entity
 *
 * @property int $advisor_contracts_id
 * @property int|null $customer_id
 * @property \Cake\I18n\Date|null $advisor_start_at
 * @property \Cake\I18n\Date|null $advisor_end_at
 * @property int|null $advisor_fee
 * @property string|null $advisor_content
 * @property int|null $consultation_id
 * @property \Cake\I18n\Date|null $initial_contract_at
 * @property \Cake\I18n\Date|null $initial_consultation_at
 * @property \Cake\I18n\Date|null $payment_at
 * @property string|null $payment_method_kbn
 * @property string|null $lawyer_id
 * @property string|null $paralegal_id
 * @property string|null $creator_id
 * @property \Cake\I18n\Date|null $created_at
 * @property string|null $updater_id
 * @property \Cake\I18n\DateTime $updated_at
 *
 * @property \App\Model\Entity\Stakeholder $stakeholder
 * @property \App\Model\Entity\Consultation $consultation
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AdvisorConsultation[] $advisor_consultations
 */
class AdvisorContract extends Entity
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
        'customer_id' => true,
        'advisor_start_at' => true,
        'advisor_end_at' => true,
        'advisor_fee' => true,
        'advisor_content' => true,
        'consultation_id' => true,
        'initial_contract_at' => true,
        'initial_consultation_at' => true,
        'payment_at' => true,
        'payment_method_kbn' => true,
        'lawyer_id' => true,
        'paralegal_id' => true,
        'creator_id' => true,
        'created_at' => true,
        'updater_id' => true,
        'updated_at' => true,
        'stakeholder' => true,
        'consultation' => true,
        'user' => true,
        'advisor_consultations' => true,
    ];
}
